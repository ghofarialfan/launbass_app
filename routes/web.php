<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

// Route root langsung ke form Tambah Pesanan
Route::get('/', [PesananController::class, 'create'])->name('tambahpesanan');
Route::post('/store', [PesananController::class, 'store'])->name('pesanan.store');
