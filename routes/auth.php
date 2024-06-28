<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\AuthCustom;
use App\Http\Middleware\GuestCustom;
use App\Livewire\Auth\ForgotPasswordComponent;
use App\Livewire\Auth\LoginComponent;
use App\Livewire\Auth\RegisterComponent;
use App\Livewire\Auth\ResetPasswordComponent;
use Illuminate\Support\Facades\Route;

Route::middleware(GuestCustom::class)->group(function () {
    Route::get('/login', LoginComponent::class)->name('login.index');
    Route::get('/register', RegisterComponent::class)->name('register.index');
    Route::get('/forgot-password', ForgotPasswordComponent::class)->name('forgot-password.index');
    Route::get('/reset-password', ResetPasswordComponent::class)->name('reset-password.index');
});

Route::controller(AuthController::class)->middleware(AuthCustom::class)
    ->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });