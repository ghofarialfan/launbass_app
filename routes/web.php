<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;

// Root ke halaman home
Route::view('/', 'home');

// Halaman statis berbasis Blade views
Route::view('/home', 'home')->name('home');
Route::view('/login', 'login')->name('login');
Route::view('/main', 'main')->name('main');
Route::view('/keuangan', 'keuangan')->name('keuangan');

Route::view('/datapelanggan', 'datapelanggan', [
    'pelanggan' => [], 
])->name('datapelanggan');
// Halaman form tambah pesanan melalui controller agar data (pelanggan/kategori) tersedia
Route::get('/tambahpesanan', [PesananController::class, 'create'])->name('tambahpesanan');

// Endpoint simpan pesanan sesuai action di Blade: route('pesanan.store')
Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');

// Opsional: route standar REST untuk create (bisa dipakai juga)
Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::view('/login-proto', 'login');
