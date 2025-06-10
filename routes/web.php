<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Rute untuk Halaman Depan (Landing Page) ---
// Rute ini memastikan bahwa ketika seseorang mengunjungi alamat utama situs Anda (misalnya, pomofy.com),
// file 'landing_page.blade.php' yang akan ditampilkan. Ini adalah halaman publik.
// File: routes/web.php
Route::get('/', function () {
    return view('landing_page');
})->name('landing_page');

// --- Rute untuk Halaman Timer (Dashboard) ---
// Rute ini adalah tujuan dari tombol "START" pada landing page.
Route::get('/dashboard', function () {
    return view('dashboard');
// ->middleware(['auth', 'verified']) adalah "penjaga".
// 'auth': Memastikan hanya pengguna yang sudah login yang bisa mengakses halaman ini.
//         Jika belum login, Laravel akan otomatis mengarahkan ke halaman login.
// 'verified': (Opsional) Memastikan email pengguna sudah diverifikasi.
// ->name('dashboard') memberi nama "dashboard" pada rute ini,
//         sehingga Anda bisa memanggilnya dengan `route('dashboard')` di file Blade.
})->middleware(['auth', 'verified'])->name('dashboard');


// --- Rute untuk Pengaturan Profil Pengguna ---
// Grup rute ini juga dilindungi oleh middleware 'auth', artinya hanya pengguna yang sudah login
// yang bisa mengakses halaman profil mereka untuk mengedit atau menghapus akun.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// --- Rute untuk Semua Proses Autentikasi ---
// Baris ini sangat penting. Ia memuat semua rute yang dibutuhkan untuk fungsionalitas
// login, register, logout, lupa password, dll., yang sudah disediakan oleh Laravel Breeze.
require __DIR__.'/auth.php';