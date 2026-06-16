<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\PerusahaanController;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Database Perusahaan (Public)
Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
Route::get('/perusahaan/{id}', [PerusahaanController::class, 'show'])->name('perusahaan.detail');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Logout pakai POST
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Routes (hanya untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    // Route untuk export PDF
    Route::get('/admin/dashboard/export', [AdminDashboardController::class, 'export'])
        ->middleware('role:admin')
        ->name('admin.dashboard.export');

    // Admin Perusahaan Management
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/profil', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profil');
        Route::get('/admin/verifikasi', [\App\Http\Controllers\Admin\VerifikasiController::class, 'index'])->name('admin.verifikasi.index');
        Route::get('/admin/verifikasi/kp/{id}', [\App\Http\Controllers\Admin\VerifikasiController::class, 'showKp'])->name('admin.verifikasi.kp.show');
        Route::post('/admin/verifikasi/kp/{id}/approve', [\App\Http\Controllers\Admin\VerifikasiController::class, 'approveKp'])->name('admin.verifikasi.kp.approve');
        Route::post('/admin/verifikasi/kp/{id}/reject', [\App\Http\Controllers\Admin\VerifikasiController::class, 'rejectKp'])->name('admin.verifikasi.kp.reject');
        
        Route::get('/admin/perusahaan', [PerusahaanController::class, 'manage'])->name('admin.perusahaan.index');
        Route::get('/admin/perusahaan/create', [PerusahaanController::class, 'create'])->name('admin.perusahaan.create');
        Route::post('/admin/perusahaan', [PerusahaanController::class, 'store'])->name('admin.perusahaan.store');
        Route::get('/admin/perusahaan/{id}/edit', [PerusahaanController::class, 'edit'])->name('admin.perusahaan.edit');
        Route::put('/admin/perusahaan/{id}', [PerusahaanController::class, 'update'])->name('admin.perusahaan.update');
        Route::delete('/admin/perusahaan/{id}', [PerusahaanController::class, 'destroy'])->name('admin.perusahaan.destroy');
    });

    // User dashboard
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
        ->middleware('role:user')
        ->name('user.dashboard');

    // User Profil
    Route::get('/user/profil', [\App\Http\Controllers\User\ProfileController::class, 'index'])
        ->middleware('role:user')
        ->name('user.profil');

    // Default dashboard redirect sesuai role
    Route::get('/dashboard', function () {
        $role = trim(auth()->user()->role);
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'user') {
            return redirect()->route('user.dashboard');
        }
        return abort(403, 'Role tidak dikenali: ' . $role);
    })->name('dashboard');


});
