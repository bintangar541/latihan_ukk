<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;

// Rute Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


// Rute yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    

    // Produk
    Route::resource('products', ProductController::class);
    Route::post('/products/{id}/upgrade-stock', [ProductController::class, 'upgradeStock'])->name('products.upgradeStock');

    // Pembelian
    Route::resource('purchase', PurchaseController::class);

    // Pengguna
    Route::resource('users', UserController::class);
});
