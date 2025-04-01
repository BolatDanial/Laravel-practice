<?php

use App\Http\Controllers\CommentController;
use App\Models\Topic;
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

Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('/profile/redaction', [AuthController::class, 'profileRedactionForm'])->middleware('auth')->name('profileRedactionForm');
Route::put('/profile/redaction', [AuthController::class, 'profileRedaction'])->middleware('auth')->name('profileRedaction');

Route::get('/forum', [ForumController::class, 'index'])->name('forum');
Route::get('/forum/create', [ForumController::class, 'createTopicForm'])->middleware('auth')->name('createTopicForm');
Route::post('/forum/create', [ForumController::class, 'createTopic'])->middleware('auth')->name('createTopic');
Route::get('/forum/{id}', [ForumController::class, 'forumTopic'])->name('forumTopic');
Route::get('/forum/update/{id}', function($id) {
    return view('updateTopicForm', ['topic' => Topic::where('id', $id)->first()]);
})->middleware('auth')->name('updateTopicForm');
Route::put('/forum/update/{id}', [ForumController::class, 'updateTopic'])->middleware('auth')->name('updateTopic');
Route::delete('/forum/{id}', [ForumController::class, 'deleteTopic'])->middleware('auth')->name('deleteTopic');

Route::post('/comment/create/{id}', [CommentController::class, 'createComment'])->middleware('auth')->name('createComment');

