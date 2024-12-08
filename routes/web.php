<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

// Route Bagian Depan

Route::get('/', [HomepageController::class, 'index'])->name('home.index');
Route::get('/about', [HomepageController::class, 'about'])->name('about.index');
Route::get('/contact', [HomepageController::class, 'contact'])->name('contact.index');
Route::get('/category', [HomepageController::class, 'category'])->name('category.index');
