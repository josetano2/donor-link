<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('home');
})->name('home');

// Get Request
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/profile', function () {return view('profile');})->name('profile');

// Post Request
Route::post('/registerAccount', [RegisterController::class, 'store'])->name('register.store');
Route::post('/login', [LoginController::class, 'login'])->name('login.account');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout.account');
Route::post('/profile/update', [UserController::class, 'upload'])->name('profile.upload');

// Put Request


// Delete Request