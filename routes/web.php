<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UMKMController;

// Halaman default saat membuka web -> dashboard
Route::get('/', [UMKMController::class, 'dashboard'])->name('dashboard');

// Jika tetap ingin URL /dashboard bisa diakses
Route::get('/dashboard', [UMKMController::class, 'dashboard']);

// Resource routes
Route::resource('kategori', KategoriController::class);
Route::resource('umkm', UMKMController::class);
