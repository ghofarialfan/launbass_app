<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController; // Pastikan ini ada dan tanpa error ketik

Route::get('/', function () {
<<<<<<< HEAD
    return view('welcome');
});
=======
    return view('home');
});

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::view('/login-proto', 'login');
>>>>>>> ed9d03ef7aa4151f661103ae931f13c258e10459
