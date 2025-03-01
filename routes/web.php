<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\landing;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\EntriPembayaranController;
use App\Http\Controllers\KelasController;

Route::post('/register-admin', [RegisterController::class, 'register'])->name('register.post');

Route::get('/', function () {
    return view('siswa.page.dashboard.IndexPage');
});

Route::get('/siswa/signin-siswa', [SiswaController::class, 'loginSiswa'])->name('siswa.login');

Route::get('/register-admin', [RegisterController::class, 'register'])->name('register');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/IndexPage', function () {
    return view('siswa.page.dashboard.IndexPage');
})->name('siswa.page.dashboard.IndexPage');

Route::get('register',function(){
    return view('register');
});

Route::get('/dashboardsiswa', function () {
    return view('siswa.page.dashboard.dashboard_siswa');
})->name('dashboard_siswa');

Route::get('/dashboardpetugas', function () {
    return view('dashboard_petugas');
})->name(name: 'dashboard_petugas');


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

Route::post('/logout', [AuthController::class, 'logoutAdmin'])->name('logout');


Route::get('/landing', [landing::class, 'show']);
Route::get('/pembayaran/form', [PembayaranController::class, 'showForm'])->name('pembayaran.form');
Route::post('/pembayaran/proses', [PembayaranController::class, 'prosesPembayaran'])->name('pembayaran.proses');
Route::get('/tambah/petugas', [PetugasController::class, 'showForm'])->name('petugas.form');
Route::post('/tambah/petugas', [PetugasController::class, 'tambahPetugas'])->name('tambah.petugas');
Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('edit.petugas');
Route::post('/petugas/{id}/edit', [PetugasController::class, 'update'])->name('update.petugas');


Route::get('/pembayaran', [PembayaranController::class, 'showForm'])->name('pembayaran.form');
Route::post('/pembayaran', [PembayaranController::class, 'prosesPembayaran'])->name('pembayaran.proses');


Route::get('/siswa/form', [SiswaController::class, 'showForm'])->name('siswa.form');
Route::post('/siswa/store', [SiswaController::class, 'tambahSiswa'])->name('siswa.store');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
Route::get('/tambah-siswa', [SiswaController::class, 'showForm'])->name('siswa.form');
// Route untuk menampilkan detail siswa
Route::post('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
Route::get('/dashboard-siswa', [PembayaranController::class, 'index'])->name('dashboard_siswa');


// Route untuk menampilkan form tambah data SPP
Route::get('/tambah/data/spp', [SppController::class, 'create'])->name('tambah.spp');

// Route untuk menyimpan data SPP ke database
Route::post('/spp/store', [SppController::class, 'store'])->name('spp.store');
Route::get('/spp', [SppController::class, 'index'])->name('spp.index');
Route::get('/spp/create', [SppController::class, 'create'])->name('spp.create');
Route::post('/spp', [SppController::class, 'store'])->name('spp.store');
Route::get('/spp/{id}/edit', [SppController::class, 'edit'])->name('spp.edit');
Route::put('/spp/{id}', [SppController::class, 'update'])->name('spp.update');
Route::delete('/spp/{id}', [SppController::class, 'destroy'])->name('spp.destroy');


Route::get('/entri/pembayaran/create', [EntriPembayaranController::class, 'create'])->name('entri.pembayaran.create');
Route::post('/entri/pembayaran/store', [EntriPembayaranController::class, 'store'])->name('entri.pembayaran.store');

Route::get('/tambah/siswa', [SiswaController::class, 'showForm'])->name('siswa.form');
Route::post('/tambah/siswa', [SiswaController::class, 'tambahSiswa'])->name('tambah.siswa');
Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
Route::get('/edit/siswa/{id}', [SiswaController::class, 'edit'])->name('edit.siswa');
Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('update.siswa');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('hapus.siswa');

Route::post('/spp/{id}/update', [SppController::class, 'update'])->name('spp.update');

Route::resource('kelas', KelasController::class);
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');


