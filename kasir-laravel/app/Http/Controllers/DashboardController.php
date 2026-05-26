<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
{
    $totalProduk = \App\Models\Product::count();

    $totalTransaksi = \App\Models\Transaction::count();

    $totalOmzet = \App\Models\Transaction::sum('total_price');

    $todaySales = \App\Models\Transaction::whereDate(
        'created_at',
        today()
    )->sum('total_price');

    $latestTransactions = \App\Models\Transaction::latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalProduk',
        'totalTransaksi',
        'totalOmzet',
        'todaySales',
        'latestTransactions'
    ));
}
}