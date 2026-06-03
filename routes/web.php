<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// contoh protected route
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return "Selamat datang di Dashboard SIMAKATA!";
    });
});
