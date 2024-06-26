<?php

use App\Http\Controllers\Public\CategoryController as PublicCategoryController;
use App\Http\Controllers\Public\PostController as PublicPostController;
use App\Livewire\Counter;
use App\Livewire\PostListComponent;
use App\Livewire\ShowPostComponent;
use Illuminate\Support\Facades\Route;

Route::controller(PublicPostController::class)->group(function () {
    Route::get('', PostListComponent::class)->name('public.posts.index');
    Route::get('post/{post:slug}', ShowPostComponent::class)->name('public.posts.show');
});

Route::controller(PublicCategoryController::class)->group(function () {
    Route::get('category/{category:slug}', 'show')->name('public.categories.show');
});

Route::get('counter', Counter::class);