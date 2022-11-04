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
Route::get('/category', [\App\Http\Controllers\PostController::class, 'categories'])->name('categories');
Route::get('/category/{categoryCode}', [\App\Http\Controllers\PostController::class, 'category'])->name('category');
Route::get('/category/{categoryCode}/{id}', [\App\Http\Controllers\PostController::class, 'showPost'])->name('post');
