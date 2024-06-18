<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\AuthCustom;
use App\Http\Middleware\GuestCustom;
use Illuminate\Support\Facades\Route;

Route::get('register', fn () => view('auth.register'))->name('auth.register')->middleware(GuestCustom::class);
Route::get('/', fn () => view('welcome'))->name('home')->middleware(AuthCustom::class);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index')->middleware(GuestCustom::class);
    Route::post('/authenticate', 'authenticate')->name('login.authenticate');
    Route::post('/logout', 'logout')->name('login.logout');
});
