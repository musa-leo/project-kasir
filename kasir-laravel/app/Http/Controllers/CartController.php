<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // =========================
    // VIEW CART
    // =========================
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    // =========================
    // ADD TO CART
    // =========================
    public function add($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return back()->with('error', 'Produk tidak ditemukan');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                'nama' => $product->nama,
                'harga' => $product->harga,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Produk masuk keranjang');
    }

    // =========================
    // REMOVE ITEM
    // =========================
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Item dihapus');
    }

    // =========================
    // CLEAR CART
    // =========================
    public function clear()
    {
        session()->forget('cart');

        return back()->with('success', 'Keranjang dikosongkan');
    }

    // =========================
    // INCREASE QTY
    // =========================
    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
            session()->put('cart', $cart);
        }

        return back();
    }

    // =========================
    // DECREASE QTY
    // =========================
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

    // =========================
    // CHECKOUT
    // =========================
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Keranjang kosong');
        }

        $request->validate([
            'cash_paid' => 'required|numeric|min:0'
        ]);

        $total = collect($cart)->sum(function ($item) {
            return $item['harga'] * $item['qty'];
        });

        if ($request->cash_paid < $total) {
            return back()->with('error', 'Uang tidak cukup');
        }

        DB::beginTransaction();

        try {

            // =========================
            // CREATE TRANSACTION
            // =========================
            $transaction = Transaction::create([
                'user_id' => Auth::id() ?? 1,
                'total_price' => $total,
                'cash_paid' => $request->cash_paid,
                'change_money' => $request->cash_paid - $total
            ]);

            // =========================
            // SAVE DETAILS + STOCK
            // =========================
            foreach ($cart as $id => $item) {

                $product = Product::findOrFail($id);

                if ($product->stok < $item['qty']) {
                    throw new \Exception("Stok {$product->nama} tidak cukup");
                }

                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $id,
                    'qty' => $item['qty'],
                    'price' => $item['harga'],
                    'subtotal' => $item['harga'] * $item['qty']
                ]);

                $product->decrement('stok', $item['qty']);
            }

            DB::commit();

            session()->forget('cart');

            return redirect("/transaksi/{$transaction->id}/struk")
                ->with('success', 'Transaksi berhasil');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }
}