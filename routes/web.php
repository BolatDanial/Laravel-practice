<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ForumController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('registerForm');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/forum', [ForumController::class, 'index'])->name('forum');
