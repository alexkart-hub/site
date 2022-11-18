<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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
Route::get('/posts/{categoryCode}/{postCode}', [\App\Http\Controllers\PostController::class, 'showPost'])->name('post');
Route::get('/storage/posts/{filename}', [\App\Http\Controllers\StoragePosts::class, 'getImage'])->name('postImage');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout', ['route'=>Route::currentRouteName()]])->name('logout');
    Route::post('/posts/comment/{postId}', [\App\Http\Controllers\PostController::class, 'comment'])->name('comment');
    Route::get('/user/profile/{user:name}', [\App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('/comment-approve', [\App\Http\Controllers\PostController::class, 'commentApprove']);
    Route::post('/comment-delete', [\App\Http\Controllers\PostController::class, 'commentDelete']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');
    Route::get('/forgot', [\App\Http\Controllers\AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [\App\Http\Controllers\AuthController::class, 'forgot'])->name('forgot_process');
});

Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts');
Route::post('/contact_form_process', [\App\Http\Controllers\ContactController::class, 'sendContactForm'])->name('contact_form_process');
