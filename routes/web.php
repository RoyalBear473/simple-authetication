<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::prefix('login')->middleware('guest')->group(function () {
    Route::get('', [AuthController::class, 'index']);
    Route::post('/', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('register')->middleware('guest')->group(function () {
    Route::get('', [AuthController::class, 'register'])->name('register');
    Route::post('', [AuthController::class, 'store']);
});
Route::prefix('content')->middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resource('user', UserController::class)->middleware('role:admin');
});