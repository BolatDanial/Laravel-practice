<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/login/submit', [LoginController::class, 'submit'])->name('login-submit');

Route::post('/register/submit', [RegisterController::class, 'submit'])->name('register-submit');
