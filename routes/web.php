<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEventController;
use App\Http\Middleware\EnsureIsLoggedIn;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', function () {
    return view('home');
})->name('home')->middleware(LanguageMiddleware::class);

// Language Switcher Route
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ja', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Authentication Routes
Route::middleware(LanguageMiddleware::class)->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/registeraccount', [RegisterController::class, 'store'])->name('register.store');
});

// Admin Routes
Route::middleware([EnsureIsLoggedIn::class, IsAdmin::class, LanguageMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::post('/', [AdminController::class, 'create'])->name('admin.create_event');
    Route::put('/{id}', [AdminController::class, 'edit'])->name('admin.edit_event');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete_event');
});

// Event Routes
Route::middleware(LanguageMiddleware::class)->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events');
});

// Authenticated User Routes
Route::middleware([EnsureIsLoggedIn::class, LanguageMiddleware::class])->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('profile');
    Route::get('/event/{id}', [UserEventController::class, 'index'])->name('event');
    Route::get('/tracker', [UserEventController::class, 'tracker'])->name('tracker');
    Route::get('/request', [RequestController::class, 'index'])->name('request');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout.account');
    Route::post('/profile/update', [UserController::class, 'upload'])->name('profile.upload');
    Route::post('/event/register', [UserEventController::class, 'register'])->name('event.register');
    Route::post('/request', [RequestController::class, 'create'])->name('request.create');
    Route::post('/event/unregister', [UserEventController::class, 'unregister'])->name('event.unregister');
});
