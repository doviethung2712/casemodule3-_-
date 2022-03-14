<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
// use App\Http\Controllers\SocialGithubController;
use App\Http\Controllers\SocialGithubController;
use App\Http\Controllers\GoogleSocialiteController;

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

Route::middleware('CheckAuth')->group(function(){
    Route::get('/', function () {
        return view('layout.index');
    })->name('home');
    Route::prefix('post')->group(function(){
        Route::get('index',[PostController::class,'index'])->name('post.index');
        Route::get('create',[PostController::class,'create'])->name('post.create');
        Route::post('create',[PostController::class,'store'])->name('post.store');
    });
});

Route::prefix('auth')->group(function () {
    Route::get('register', [AuthController::class, 'showFormRegister'])->name('showformregister');
    Route::post('register', [AuthController::class, 'register'])->name('register')->middleware('CheckRegister');
    Route::get('login', [AuthController::class, 'showFormLogin'])->name('showformlogin');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/auth/redirect/{provider}', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('/callback/{provider}', [GoogleSocialiteController::class, 'handleCallback']);
// Route::get('auth/github', [SocialGithubController::class, 'redirectToGithub']);
// Route::get('callback/github', [SocialGithubController::class, 'handleCallback']);


