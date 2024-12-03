<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEventController;
use App\Http\Middleware\EnsureIsLoggedIn;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Get Request
Route::get('/admin', [AdminController::class, 'index'])->name('admin')
    ->middleware(IsAdmin::class);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/events', [EventController::class, 'index'])->name('events');

// Post Request
Route::post('/registeraccount', [registercontroller::class, 'store'])->name('register.store');
route::post('/login', [logincontroller::class, 'login'])->name('login');
Route::post('/admin', [AdminController::class, 'create'])->name('admin.create_event');
Route::post('/event/register', [UserEventController::class, 'register'])->name('event.register');

// Put Request
Route::put('/admin/{id}', [AdminController::class, 'edit'])->name('admin.edit_event');

// Delete Request
Route::delete('/adminDelete/{id}', [AdminController::class, 'delete'])->name('admin.delete_event');

// Auth Request
Route::middleware([EnsureIsLoggedIn::class])->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('profile');
    Route::get('/event/{id}', [UserEventController::class, 'index'])->name('event');
    Route::get('/tracker', [UserEventController::class, 'tracker'])->name('tracker');
    Route::get('/request', [RequestController::class, 'index'])->name('request');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout.account');
    Route::post('/profile/update', [UserController::class, 'upload'])->name('profile.upload');
    Route::post('/request', [RequestController::class, 'create'])->name('request.create');
});
