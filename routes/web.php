<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

// Route Bagian Depan

Route::get('/', [HomepageController::class, 'index'])->name('home.index');
