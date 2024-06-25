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
use Illuminate\Support\Facades\Route;

require __DIR__ . '/public.php';
require __DIR__ . '/auth.php';

Route::name('dashboard.')->prefix('dashboard')->middleware(AuthCustom::class)
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('posts', PostController::class)->except('show');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');
    });

Route::controller(UserController::class)->middleware(AuthCustom::class)
    ->group(function () {
        Route::get('user/edit', 'edit')->name('user.edit');
        Route::put('user/update', 'update')->name('user.update');
        Route::delete('user/destroyImage', 'destroyImage')->name('user.destroyImage');
    });