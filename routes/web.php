<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('products', ProductController::class);
Route::post('/products/{id}/upgrade-stock', [ProductController::class, 'upgradeStock'])->name('products.upgradeStock');
Route::resource('purchase', PurchaseController::class);
Route::resource('users', UserController::class);
