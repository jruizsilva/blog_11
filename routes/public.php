<?php

use App\Http\Controllers\Public\CategoryController as PublicCategoryController;
use App\Http\Controllers\Public\PostController as PublicPostController;
use App\Livewire\Counter;
use App\Livewire\Public\HomeComponent;
use App\Livewire\Public\ShowCategoryComponent;
use App\Livewire\Public\ShowPostComponent;
use Illuminate\Support\Facades\Route;

Route::controller(PublicPostController::class)->group(function () {
    Route::get('', HomeComponent::class)->name('public.home.index');
    Route::get('post/{post:slug}', ShowPostComponent::class)->name('public.posts.show');
});

Route::controller(PublicCategoryController::class)->group(function () {
    Route::get('category/{category:slug}', ShowCategoryComponent::class)->name('public.categories.show');
});

Route::get('counter', Counter::class);