<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
<<<<<<< HEAD
    return view('welcome');
});
=======
    return view('home');
});

Route::view('/login-proto', 'login');
>>>>>>> ed9d03ef7aa4151f661103ae931f13c258e10459
