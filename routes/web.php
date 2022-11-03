<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');
Route::get('/theme', [\App\Http\Controllers\PostController::class, 'categories'])->name('themes');
Route::get('/theme/{themeCode}', [\App\Http\Controllers\PostController::class, 'category'])->name('theme');
Route::get('/theme/{themeCode}/{id}', [\App\Http\Controllers\PostController::class, 'showPost'])->name('post');
