<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cart = session()->get('cart', []);

        return view('transaksi.index', compact('products', 'cart'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart', []);

        if (!$product) {
            return back()->with('error', 'Produk tidak ditemukan');
        }

        if ($product->stok <= 0) {
            return back()->with('error', 'Stok habis');
        }

        if (isset($cart[$id])) {

            if ($cart[$id]['qty'] >= $product->stok) {
                return back()->with('error', 'Stok tidak mencukupi');
            }

            $cart[$id]['qty'] += 1;

        } else {

            $cart[$id] = [
                'nama'  => $product->nama,
                'harga' => $product->harga,
                'qty'   => 1
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Produk ditambahkan');
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);
        $product = Product::find($id);

        if (!$product || !isset($cart[$id])) {
            return back();
        }

        if ($cart[$id]['qty'] < $product->stok) {
            $cart[$id]['qty']++;
            session()->put('cart', $cart);
        } else {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        return back();
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['qty']--;

            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return back();
    }

    public function removeItem($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Item dihapus');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Keranjang kosong');
        }

        $total = collect($cart)->sum(fn ($item) =>
            $item['harga'] * $item['qty']
        );

        $request->validate([
            'payment' => ['required', 'numeric', 'min:' . $total],
        ], [
            'payment.min' => 'Uang pembayaran kurang',
        ]);

        DB::beginTransaction();

        try {

            $transaction = Transaction::create([
                'user_id'      => auth()->id() ?? 1,
                'total_price'  => $total,
                'payment'      => $request->payment,
                'change_money' => $request->payment - $total,
            ]);

            foreach ($cart as $id => $item) {

                $product = Product::find($id);

                if (!$product) {
                    throw new \Exception("Produk tidak ditemukan");
                }

                if ($product->stok < $item['qty']) {
                    throw new \Exception("Stok {$product->nama} tidak cukup");
                }

                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id'     => $id,
                    'qty'            => $item['qty'],
                    'price'          => $item['harga'],
                    'subtotal'       => $item['harga'] * $item['qty'],
                ]);

                $product->decrement('stok', $item['qty']);
            }

            DB::commit();

            session()->forget('cart');

            return redirect()
                ->route('transaksi.struk', $transaction->id)
                ->with('success', 'Transaksi berhasil');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    public function struk($id)
    {
        $transaction = Transaction::with('details.product')
            ->findOrFail($id);

        return view('transaksi.struk', compact('transaction'));
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return back()->with('error', 'Transaksi tidak ditemukan');
        }

        DB::beginTransaction();

        try {
            $transaction->details()->delete();
            $transaction->delete();

            DB::commit();

            return back()->with('success', 'Transaksi berhasil dihapus');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }
}