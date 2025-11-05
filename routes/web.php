<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController; // Pastikan ini ada dan tanpa error ketik

Route::get('/', function () {
    return view('home');
});

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::view('/login-proto', 'login');
