@extends('layouts.auth')

@section('title', 'Daftar Akun - SIMAKATA')

@section('content')
<div class="auth-card">
    {{-- LEFT: Branding Panel --}}
    <div class="auth-brand">
        <div class="brand-diamond"></div>
        <img src="{{ asset('images/simakata-illustration.png') }}" alt="SIMAKATA Illustration" class="brand-illustration">
        <h2 class="brand-title">SIMAKATA</h2>
        <p class="brand-subtitle">
            Sistem Informasi Mahasiswa Kerja Praktek dan Tugas Akhir. Terintegrasi, modern, dan efisien.
        </p>
    </div>

    {{-- RIGHT: Register Form --}}
    <div class="auth-form-panel">
        <h1>Buat Akun Baru</h1>
        <p class="subtitle">Daftarkan akun mahasiswa Anda untuk mengakses sistem SIMAKATA.</p>

        {{-- Error Message from redirect --}}
        @if(session('error'))
            <div class="alert alert-danger">
                <span class="material-icons-outlined" style="font-size:18px;">error</span>
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" id="register-form">
            @csrf

            {{-- NIM --}}
            <div class="form-group">
                <label class="form-label" for="nim">Nomor Induk Mahasiswa (NIM)</label>
                <div class="input-wrapper">
                    <span class="material-icons-outlined input-icon">badge</span>
                    <input
                        type="text"
                        id="nim"
                        name="nim"
                        placeholder="Contoh: 12345678"
                        value="{{ old('nim') }}"
                        required
                        autofocus
                        autocomplete="username"
                    >
                </div>
                @error('nim')
                    <p class="error-text">
                        <span class="material-icons-outlined" style="font-size:14px;">warning</span>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label class="form-label" for="password">Kata Sandi</label>
                <div class="input-wrapper">
                    <span class="material-icons-outlined input-icon">lock_outline</span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimal 6 karakter"
                        required
                        autocomplete="new-password"
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword('password', this)" aria-label="Toggle password visibility">
                        <span class="material-icons-outlined">visibility</span>
                    </button>
                </div>
                @error('password')
                    <p class="error-text">
                        <span class="material-icons-outlined" style="font-size:14px;">warning</span>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="form-group">
                <label class="form-label" for="password_confirmation">Konfirmasi Kata Sandi</label>
                <div class="input-wrapper">
                    <span class="material-icons-outlined input-icon">lock_outline</span>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Ulangi kata sandi"
                        required
                        autocomplete="new-password"
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', this)" aria-label="Toggle password visibility">
                        <span class="material-icons-outlined">visibility</span>
                    </button>
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-submit" id="btn-register">Daftar Akun</button>
        </form>

        <p class="auth-switch">
            Sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a>
        </p>

        <div class="auth-help">
            <a href="#">
                <span class="material-icons-outlined">help_outline</span>
                Bantuan
            </a>
            <a href="#">
                <span class="material-icons-outlined">menu_book</span>
                Panduan
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('.material-icons-outlined');
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    }
</script>
@endsection
