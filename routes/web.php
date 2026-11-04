<?php

use Illuminate\Support\Facades\Route;

// Halaman publik: landing page -> pilih Masuk / Daftar
Route::view('/', 'landing')->name('landing');
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

// Area Owner (pemilik kos)
// Catatan: data diambil lewat API (token Sanctum). Halaman ini sendiri hanya
// kerangka; pengecekan login dilakukan di sisi browser (redirect ke /login).
Route::prefix('owner')->group(function () {
    Route::view('/dashboard', 'owner.dashboard');
    Route::view('/kamar', 'owner.kamar');
    Route::view('/form-inspeksi', 'owner.form-inspeksi');
    Route::view('/perbandingan-kondisi', 'owner.perbandingan-kondisi');
    Route::view('/perhitungan-deposit', 'owner.perhitungan-deposit');
});

// Area Tenant (penghuni)
Route::prefix('tenant')->group(function () {
    Route::view('/dashboard', 'tenant.dashboard');
    Route::view('/beranda', 'tenant.mobile.beranda');
    Route::view('/kondisi-kamar', 'tenant.mobile.kondisi-kamar');
    Route::view('/deposit', 'tenant.mobile.deposit');
});
