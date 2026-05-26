<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| REDIRECT AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if (auth()->check()) {

        if (auth()->user()->role == 'admin') {
            return redirect()->route('dashboard');
        }

        return redirect()->route('kasir.dashboard');
    }

    return redirect()->route('login');

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    // FORM LOGIN
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    // PROSES LOGIN
    Route::post('/login', [AuthController::class, 'login']);

});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| SEMUA HALAMAN LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD KASIR
    |--------------------------------------------------------------------------
    */

    Route::get('/kasir', function () {

        return view('kasir.dashboard');

    })->name('kasir.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PRODUK
    |--------------------------------------------------------------------------
    */

    Route::resource('produk', ProdukController::class);

    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI
    |--------------------------------------------------------------------------
    */

    Route::get('/transaksi', [TransaksiController::class, 'index'])
        ->name('transaksi.index');

    Route::post('/transaksi/add/{id}', [TransaksiController::class, 'addToCart'])
        ->name('transaksi.add');

    Route::post('/transaksi/increase/{id}', [TransaksiController::class, 'increase'])
        ->name('transaksi.increase');

    Route::post('/transaksi/decrease/{id}', [TransaksiController::class, 'decrease'])
        ->name('transaksi.decrease');

    Route::delete('/transaksi/remove/{id}', [TransaksiController::class, 'removeItem'])
        ->name('transaksi.remove');

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/transaksi/checkout', [TransaksiController::class, 'checkout'])
        ->name('transaksi.checkout');

    /*
    |--------------------------------------------------------------------------
    | STRUK
    |--------------------------------------------------------------------------
    */

    Route::get('/transaksi/struk/{id}', [TransaksiController::class, 'struk'])
        ->name('transaksi.struk');

    /*
    |--------------------------------------------------------------------------
    | DELETE TRANSAKSI
    |--------------------------------------------------------------------------
    */

    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])
        ->name('transaksi.destroy');

});