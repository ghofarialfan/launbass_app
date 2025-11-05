<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::view('/login-proto', 'login');
