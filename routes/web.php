<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login_siswa');
});

Route::get('/dashboardsiswa', function () {
    return view('dashboard_siswa');
});

Route::get('/dashboardpetugas', function (){
    return view('dashboard_petugas');
});


// Route Siswa
Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
    Route::get('/signin-siswa', [SiswaController::class, 'loginSiswa'])->name('login');
    Route::post('/signin-siswa', [SiswaController::class, 'signinSiswa'])->name('signin');
});

// Route Auth
Route::post('/signin', [AuthController::class, 'signIn'])->name('signin');

// Route Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/signin-admin', [OperatorController::class, 'signinAdmin'])->name('signin');
    Route::post('/login-admin', [OperatorController::class, 'loginAdmin'])->name('login');

    // Register Admin
    Route::get('/register-admin', [RegisterController::class, 'registerAdmin'])->name('register');
    Route::post('/signup-admin', [RegisterController::class, 'signupAdmin'])->name('signup');
});
