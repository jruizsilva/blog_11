<?php


use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\MediaController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Middleware\AuthCustom;
use App\Livewire\Dashboard\CreatePostComponent;
use App\Livewire\Dashboard\DashboardHomeComponent;
use App\Livewire\Dashboard\EditPostComponent;
use App\Livewire\Dashboard\PostListComponent;
use App\Livewire\User\ProfileComponent;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/public.php';
require __DIR__ . '/auth.php';

Route::name('dashboard.')->prefix('dashboard')->middleware(AuthCustom::class)
    ->group(function () {
        Route::get('/', DashboardHomeComponent::class)->name('index');
        Route::get('/posts', PostListComponent::class)->name('posts.index');
        Route::get('/posts/create', CreatePostComponent::class)->name('posts.create');
        Route::get('/posts/edit', EditPostComponent::class)->name('posts.edit');
        // Route::resource('posts', PostController::class)->except('show');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::post('media/upload', [MediaController::class, 'store'])->name('media.upload');
    });

Route::middleware(AuthCustom::class)->group(function () {
    Route::get('user/edit', ProfileComponent::class)->name('user.edit');
});