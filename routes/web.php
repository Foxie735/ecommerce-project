<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route Bagian Depan

Route::get('/', [HomepageController::class, 'index'])->name('home.index');
Route::get('/about', [HomepageController::class, 'about'])->name('home.about');
Route::get('/contact', [HomepageController::class, 'contact'])->name('home.contact');
Route::get('/category', [HomepageController::class, 'category'])->name('home.category');

// Route::get('/dashboard', function() {
//     return view('layouts.dashboard');
// });

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    // Route Kategori
    Route::resource('category', KategoriController::class);
    // Route Produk
    Route::resource('product', ProdukController::class);
    // Route Customer
    Route::resource('customer', CustomerController::class);
});