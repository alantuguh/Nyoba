<?php

use App\Http\Controllers\LeaseController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Web\WorkspaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', [WorkspaceController::class, 'login'])->name('login.post');
Route::post('/logout', [WorkspaceController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('/', [WorkspaceController::class, 'dashboard'])->name('dashboard');

    Route::get('/kamar', [WorkspaceController::class, 'rooms'])->name('kamar.index');
    Route::post('/kamar', [WorkspaceController::class, 'storeRoom'])->name('kamar.store');
    Route::get('/kamar/{nomor}', [WorkspaceController::class, 'room'])->name('kamar.show');

    // Modul Anggota 3: Penghuni (Tenants) & Kontrak Sewa (Leases)
    Route::resource('tenants', TenantController::class);
    Route::resource('leases', LeaseController::class);

    // Alias untuk menu sidebar Bahasa Indonesia di layouts/app.blade.php
    Route::get('/penghuni', [TenantController::class, 'index'])->name('penghuni.index');
    Route::post('/penghuni', [TenantController::class, 'store'])->name('penghuni.store');
    Route::get('/sewa', [LeaseController::class, 'index'])->name('sewa.index');
    Route::post('/sewa', [LeaseController::class, 'store'])->name('sewa.store');

    Route::get('/inspeksi', fn () => redirect()->route('inspeksi.create'))->name('inspeksi.index');
    Route::get('/inspeksi/form', fn () => view('inspeksi.form'))->name('inspeksi.create');
    Route::post('/inspeksi/form', function (Request $request) {
        return redirect()->route('inspeksi.create')
            ->with('warning', 'Modul inspeksi belum tersedia pada backend yang terhubung; data belum disimpan.');
    })->name('inspeksi.store');
    Route::get('/inspeksi/komparasi', fn () => view('inspeksi.komparasi'))->name('inspeksi.komparasi');

    Route::get('/deposit/perhitungan', fn () => view('deposit.perhitungan'))->name('deposit.perhitungan');
});

Route::middleware(['auth', 'role:tenant'])->group(function () {
    Route::get('/portal-penghuni', fn () => view('portal-penghuni.dashboard'))->name('portal.dashboard');
    Route::get('/m/beranda', fn () => view('portal-penghuni.mobile-beranda'))->name('mobile.beranda');
    Route::get('/m/kondisi', fn () => view('portal-penghuni.mobile-kondisi'))->name('mobile.kondisi');
    Route::get('/m/deposit', fn () => view('portal-penghuni.mobile-deposit'))->name('mobile.deposit');
});