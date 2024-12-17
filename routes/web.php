<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\SlideshowController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AlamatPengirimanController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TransaksiUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route Bagian Depan

Route::get('/', [HomepageController::class, 'index'])->name('home.index');
Route::get('/about', [HomepageController::class, 'about'])->name('home.about');
Route::get('/contact', [HomepageController::class, 'contact'])->name('home.contact');
Route::get('/category', [HomepageController::class, 'category'])->name('home.category');

Route::get('/productdetail/{slug}', [HomepageController::class, 'productdetail'])->name('home.productdetail');
Route::get('/category/{slug}', [HomepageController::class, 'categorybyslug'])->name('home.categorybyslug');

Route::middleware(['auth', 'role:member', 'status:active'])->group(function () {
    Route::resource('cart', CartController::class);
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::patch('empty/{id}', [CartController::class, 'empty']);
    Route::resource('cartdetail', CartDetailController::class);

    Route::resource('usertransaction', TransaksiUserController::class);

    Route::resource('shippingaddress', AlamatPengirimanController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        // Route Kategori
        Route::resource('category', KategoriController::class);
        Route::get('/find-category', [KategoriController::class, 'find'])->name('category.find');
        // Route Produk
        Route::resource('product', ProdukController::class);
        Route::get('/find-product', [ProdukController::class, 'find'])->name('product.find');
        Route::post('/image-product', [ProdukController::class, 'store_image'])->name('product.store_image');
        Route::delete('/image-product/{id}', [ProdukController::class, 'destroy_image'])->name('product.destroy_image');
        // Route Customer
        Route::resource('customer', CustomerController::class);
        Route::get('/find-customer', [CustomerController::class, 'find'])->name('customer.find');
        // Route Transaksi
        Route::resource('transaction', TransaksiController::class);
        Route::get('/find-transaction', [TransaksiController::class, 'find'])->name('transaction.find');
        // Route Profile
        // Route::get('/profile', [UserController::class, 'index'])->name('profile.index');
        // Route Setting Profile
        // Route::get('/setting', [UserController::class, 'setting'])->name('profile.setting');
        // Route Slideshow
        Route::resource('slideshow', SlideshowController::class);
        // Form Laporan
        Route::get('/salesreport', [LaporanController::class, 'index'])->name('salesreport');
        // Proses Laporan
        Route::get('/processreport', [LaporanController::class, 'process'])->name('salesreport.process');
    });
});

Auth::routes();


Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
