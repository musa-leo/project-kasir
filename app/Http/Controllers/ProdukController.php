<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('produk.index', compact('products'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'harga' => 'required|numeric',
            'stok'  => 'required|numeric',
        ]);

        Product::create([
            'nama'  => $request->nama,
            'harga' => $request->harga,
            'stok'  => $request->stok,
        ]);

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }
    public function edit($id)
    {
    $produk = Product::findOrFail($id);

    return view('produk.edit', compact('produk'));
    }
    
    public function update(Request $request, $id)
    {
    $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
    ]);

    $produk = Product::findOrFail($id);

    $produk->update([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'stok' => $request->stok,
    ]);

    return redirect()
        ->route('produk.index')
        ->with('success', 'Product updated successfully');
    }
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect('/produk')->with('success', 'Produk berhasil dihapus');
    }
}