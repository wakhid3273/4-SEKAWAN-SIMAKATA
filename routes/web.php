<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

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
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    // User dashboard
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
        ->middleware('role:user')
        ->name('user.dashboard');

    // Route untuk export PDF
    Route::get('/admin/dashboard/export', [AdminDashboardController::class, 'export'])
        ->name('admin.dashboard.export');

    // Default dashboard jika tidak pakai role middleware
    Route::get('/dashboard', function () {
        return "Selamat datang di Dashboard SIMAKATA!";
    })->name('dashboard');
});
