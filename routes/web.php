<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Routes (hanya untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    // User dashboard
    Route::get('/user/home', [DashboardController::class, 'user'])
        ->middleware('role:user')
        ->name('user.home');

    // Default dashboard jika tidak pakai role middleware
    Route::get('/dashboard', function () {
        return "Selamat datang di Dashboard SIMAKATA!";
    })->name('dashboard');
});
