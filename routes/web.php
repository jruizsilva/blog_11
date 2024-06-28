<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MediaController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Home\UserController;
use App\Http\Middleware\AuthCustom;
use App\Livewire\User\ProfileComponent;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/public.php';
require __DIR__ . '/auth.php';

Route::name('dashboard.')->prefix('dashboard')->middleware(AuthCustom::class)
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('posts', PostController::class)->except('show');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::post('media/upload', [MediaController::class, 'store'])->name('media.upload');
    });

Route::middleware(AuthCustom::class)->group(function () {
    Route::get('user/edit', ProfileComponent::class)->name('user.edit');
});