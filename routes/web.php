<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::prefix('login')->middleware('guest')->group(function () {
    Route::get('', [LoginController::class, 'index']);
    Route::post('/', [LoginController::class, 'login'])->middleware('throttle:5,1')->name('login');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('register')->middleware('guest')->group(function () {
    Route::get('', [RegisterController::class, 'index'])->name('register');
    Route::post('', [RegisterController::class, 'store']);
});
Route::prefix('content')->middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resource('user', UserController::class);
});