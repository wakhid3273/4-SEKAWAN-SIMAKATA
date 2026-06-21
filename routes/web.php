<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\JudulTaController;
use App\Http\Controllers\RiwayatController;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Database Perusahaan (Public)
Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
Route::get('/perusahaan/{id}', [PerusahaanController::class, 'show'])->name('perusahaan.detail');

// Judul TA (Public)
Route::get('/judul-ta', [JudulTaController::class, 'index'])->name('judul-ta.index');

// Riwayat Magang (Public)
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');

// Logout pakai POST
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Routes (hanya untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    // Admin Riwayat Aktivitas
    Route::get('/admin/riwayat-aktivitas', [\App\Http\Controllers\Admin\RiwayatAktivitasController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.riwayat-aktivitas');

    // Route untuk export PDF
    Route::get('/admin/dashboard/export', [AdminDashboardController::class, 'export'])
        ->middleware('role:admin')
        ->name('admin.dashboard.export');

    // Admin Perusahaan Management
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/profil', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profil');
        Route::get('/admin/profil/edit', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('admin.profil.edit');
        Route::put('/admin/profil', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profil.update');
        
        Route::get('/admin/verifikasi', [\App\Http\Controllers\Admin\VerifikasiController::class, 'index'])->name('admin.verifikasi.index');
        Route::get('/admin/verifikasi/kp/{id}', [\App\Http\Controllers\Admin\VerifikasiController::class, 'showKp'])->name('admin.verifikasi.kp.show');
        Route::post('/admin/verifikasi/kp/{id}/approve', [\App\Http\Controllers\Admin\VerifikasiController::class, 'approveKp'])->name('admin.verifikasi.kp.approve');
        Route::post('/admin/verifikasi/kp/{id}/reject', [\App\Http\Controllers\Admin\VerifikasiController::class, 'rejectKp'])->name('admin.verifikasi.kp.reject');

        // Verifikasi Tugas Akhir
        Route::get('/admin/verifikasi/ta/{id}', [\App\Http\Controllers\Admin\VerifikasiController::class, 'showTa'])->name('admin.verifikasi.ta.show');
        Route::post('/admin/verifikasi/ta/{id}/approve', [\App\Http\Controllers\Admin\VerifikasiController::class, 'approveTa'])->name('admin.verifikasi.ta.approve');
        Route::post('/admin/verifikasi/ta/{id}/reject', [\App\Http\Controllers\Admin\VerifikasiController::class, 'rejectTa'])->name('admin.verifikasi.ta.reject');
        
        Route::get('/admin/perusahaan', [PerusahaanController::class, 'manage'])->name('admin.perusahaan.index');
        Route::get('/admin/perusahaan/create', [PerusahaanController::class, 'create'])->name('admin.perusahaan.create');
        Route::post('/admin/perusahaan', [PerusahaanController::class, 'store'])->name('admin.perusahaan.store');
        Route::get('/admin/perusahaan/{id}/edit', [PerusahaanController::class, 'edit'])->name('admin.perusahaan.edit');
        Route::put('/admin/perusahaan/{id}', [PerusahaanController::class, 'update'])->name('admin.perusahaan.update');
        Route::delete('/admin/perusahaan/{id}', [PerusahaanController::class, 'destroy'])->name('admin.perusahaan.destroy');

        // Admin Mahasiswa Management
        Route::get('/admin/mahasiswa/export-pdf', [\App\Http\Controllers\Admin\MahasiswaController::class, 'exportPdf'])->name('admin.mahasiswa.export-pdf');
        Route::resource('/admin/mahasiswa', \App\Http\Controllers\Admin\MahasiswaController::class)->names('admin.mahasiswa');
    });

    // User dashboard
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
        ->middleware('role:user')
        ->name('user.dashboard');

    // User Profil
    Route::get('/user/profil', [\App\Http\Controllers\User\ProfileController::class, 'index'])
        ->middleware('role:user')
        ->name('user.profil');
    Route::get('/user/profil/edit', [\App\Http\Controllers\User\ProfileController::class, 'edit'])
        ->middleware('role:user')
        ->name('user.profil.edit');
    Route::put('/user/profil', [\App\Http\Controllers\User\ProfileController::class, 'update'])
        ->middleware('role:user')
        ->name('user.profil.update');

    // User Input KP/Magang
    Route::get('/user/input-kp-magang', [\App\Http\Controllers\User\KpMagangController::class, 'create'])
        ->middleware('role:user')
        ->name('user.kp-magang.create');
    Route::post('/user/input-kp-magang', [\App\Http\Controllers\User\KpMagangController::class, 'store'])
        ->middleware('role:user')
        ->name('user.kp-magang.store');
    Route::get('/user/kp-magang/{id}/edit', [\App\Http\Controllers\User\KpMagangController::class, 'edit'])
        ->middleware('role:user')
        ->name('user.kp-magang.edit');
    Route::put('/user/kp-magang/{id}', [\App\Http\Controllers\User\KpMagangController::class, 'update'])
        ->middleware('role:user')
        ->name('user.kp-magang.update');

    // User Input Tugas Akhir
    Route::get('/user/input-tugas-akhir', [\App\Http\Controllers\User\TugasAkhirController::class, 'create'])
        ->middleware('role:user')
        ->name('user.tugas-akhir.create');
    Route::post('/user/input-tugas-akhir', [\App\Http\Controllers\User\TugasAkhirController::class, 'store'])
        ->middleware('role:user')
        ->name('user.tugas-akhir.store');
    Route::get('/user/tugas-akhir/{id}/edit', [\App\Http\Controllers\User\TugasAkhirController::class, 'edit'])
        ->middleware('role:user')
        ->name('user.tugas-akhir.edit');
    Route::put('/user/tugas-akhir/{id}', [\App\Http\Controllers\User\TugasAkhirController::class, 'update'])
        ->middleware('role:user')
        ->name('user.tugas-akhir.update');

    // User Riwayat Aktivitas (spesifik untuk user yang login)
    Route::get('/user/riwayat-aktivitas', [\App\Http\Controllers\User\RiwayatAktivitasController::class, 'index'])
        ->middleware('role:user')
        ->name('user.riwayat-aktivitas');

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
