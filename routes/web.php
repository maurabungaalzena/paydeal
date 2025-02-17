<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\landing;
use App\Http\Controllers\PetugasController;


Route::get('/landing', [landing::class, 'show']);
Route::get('/pembayaran/form', [PembayaranController::class, 'showForm'])->name('pembayaran.form');
Route::post('/pembayaran/proses', [PembayaranController::class, 'prosesPembayaran'])->name('pembayaran.proses');
Route::get('/tambah/petugas', [PetugasController::class, 'showForm'])->name('petugas.form');
Route::post('/tambah/petugas', [PetugasController::class, 'tambahPetugas'])->name('tambah.petugas');
Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('edit.petugas');
Route::post('/petugas/{id}/edit', [PetugasController::class, 'update'])->name('update.petugas');

