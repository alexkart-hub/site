<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Api\V1\IndexController::class, 'index'])->name('home');
Route::get('/post/all', [\App\Http\Controllers\Api\V1\IndexController::class, 'allPosts'])->name('all_posts');
Route::get('/post/last', [\App\Http\Controllers\Api\V1\IndexController::class, 'lastPost'])->name('last_post');
