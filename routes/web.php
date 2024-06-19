<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\AuthCustom;
use App\Http\Middleware\GuestCustom;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home')->middleware(AuthCustom::class);

Route::controller(LoginController::class)->middleware(GuestCustom::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/authenticate', 'authenticate')->name('login.authenticate');
});

Route::controller(RegisterController::class)->middleware(GuestCustom::class)->group(function () {
    Route::get('/register', 'index')->name('register.index');
    Route::post('/register', 'store')->name('register.store');
});

Route::controller(AuthController::class)->middleware(AuthCustom::class)->group(function () {
    Route::post('/logout', 'logout')->name('logout');
});
