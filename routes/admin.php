<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
    Route::post('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
});

Route::middleware('auth:admin')->group(function () {
    Route::resources([
        'posts' => \App\Http\Controllers\Admin\PostController::class,
        'categories' => \App\Http\Controllers\Admin\CategoryController::class,
        'tags' => \App\Http\Controllers\Admin\TagController::class,
    ]);
    Route::get('', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('main');
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    Route::post('translit', [\App\Http\Controllers\PostController::class, 'translit']);
});
