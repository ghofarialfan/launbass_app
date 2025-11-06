<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Public routes first (login / register). Protected routes use a simple
| session check in closures, then call the controller methods so you don't
| have to modify controller constructors.
|
*/

/* ----------------------------
   Public routes (no session req)
   ----------------------------*/
Route::view('/login', 'login')->name('login');
Route::view('/login-proto', 'login');

// Register (GET -> show form, POST -> store)
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Logout (clears session)
Route::post('/logout', function () {
    session()->flush();
    return redirect('/login');
})->name('logout');

/* ----------------------------
   Protected view routes (closure checks)
   ----------------------------*/
Route::get('/', function () {
    if (! session()->has('user_id')) return redirect('/login');
    return view('home');
});

Route::get('/home', function () {
    if (! session()->has('user_id')) return redirect('/login');
    return view('home');
})->name('home');

Route::get('/main', function () {
    if (! session()->has('user_id')) return redirect('/login');
    return view('main');
})->name('main');

Route::get('/keuangan', function () {
    if (! session()->has('user_id')) return redirect('/login');
    return view('keuangan');
})->name('keuangan');

Route::get('/datapelanggan', function () {
    if (! session()->has('user_id')) return redirect('/login');
    return view('datapelanggan', ['pelanggan' => []]);
})->name('datapelanggan');

/* ----------------------------
   Controller routes protected by closure checks
   ----------------------------*/

// Show create pesanan form (calls PesananController::create)
Route::get('/tambahpesanan', function () {
    if (! session()->has('user_id')) return redirect('/login');

    $controller = app()->make(PesananController::class);
    return app()->call([$controller, 'create']);
})->name('tambahpesanan');

// Store pesanan (calls PesananController::store)
Route::post('/pesanan', function () {
    if (! session()->has('user_id')) return redirect('/login');

    $controller = app()->make(PesananController::class);
    return app()->call([$controller, 'store']);
})->name('pesanan.store');

// Optional route alias if you used it before
Route::get('/pesanan/create', function () {
    if (! session()->has('user_id')) return redirect('/login');

    $controller = app()->make(PesananController::class);
    return app()->call([$controller, 'create']);
})->name('pesanan.create');

// Pelanggan index (calls PelangganController::index)
Route::get('/pelanggan', function () {
    if (! session()->has('user_id')) return redirect('/login');

    $controller = app()->make(PelangganController::class);
    return app()->call([$controller, 'index']);
});
