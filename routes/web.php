<?php

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

// 🔹 Set halaman default ("/") langsung ke halaman register
Route::get('/', [RegisterController::class, 'showRegisterForm'])->name('register.form');

// 🔹 Rute untuk registrasi
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// 🔹 Rute untuk login/logout
Route::get('/login', [OperatorController::class, 'loginOperator'])->name('login');
Route::post('/signin', [OperatorController::class, 'signinOperator'])->name('operator.signin');
Route::post('/logout', [OperatorController::class, 'logoutOperator'])->name('operator.logout');

// 🔹 Middleware untuk user yang sudah login
Route::middleware(['auth:petugas'])->group(function () {
    // 🔹 Dashboard Admin
    Route::get('/dashboard/admin', function () {
        return view('dashboard_admin');
    })->name('dashboard_admin');

    // 🔹 Dashboard Petugas
    Route::get('/dashboard/petugas', function () {
        return view('dashboard_petugas');
    })->name('dashboard_petugas');

    // 🔹 Rute untuk entri transaksi pembayaran
    Route::get('/petugas/entri-transaksi', [PembayaranController::class, 'entriTransaksi'])->name('entri_transaksi');

    // 🔹 Rute untuk melihat history pembayaran
    Route::get('/petugas/history-pembayaran', [PembayaranController::class, 'historyPembayaran'])->name('history_pembayaran');
});
