<?php

use App\Http\Controllers\Public\CategoryController as PublicCategoryController;
use App\Http\Controllers\Public\PostController as PublicPostController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicPostController::class)->group(function () {
    Route::get('', 'index')->name('public.posts.index');
    Route::get('post/{post:slug}', 'show')->name('public.posts.show');
});

Route::controller(PublicCategoryController::class)->group(function () {
    Route::get('category/{category:slug}', 'show')->name('public.categories.show');
});
