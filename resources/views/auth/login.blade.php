@extends('layouts.auth')

@section('title', 'Login - SIMAKATA')

@section('content')
<div class="auth-card">
    {{-- LEFT: Branding Panel --}}
    <div class="auth-brand">
        <div class="brand-diamond"></div>
        <img src="{{ asset('images/simakata-illustration.png') }}" alt="SIMAKATA Illustration" class="brand-illustration">
        <h2 class="brand-title">SIMAKATA</h2>
        <p class="brand-subtitle">
            Sistem Informasi Mahasiswa Kerja Praktik, Magang, dan Tugas Akhir. Terintegrasi, modern, dan efisien.
        </p>
    </div>

    {{-- RIGHT: Login Form --}}
    <div class="auth-form-panel">
        <h1>Selamat Datang</h1>
        <p class="subtitle">Silakan masuk menggunakan akun mahasiswa Anda untuk melanjutkan.</p>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                <span class="material-icons-outlined" style="font-size:18px;">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="alert alert-danger">
                <span class="material-icons-outlined" style="font-size:18px;">error</span>
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf

            {{-- NIM --}}
            <div class="form-group">
                <label class="form-label" for="nim">Nomor Induk Mahasiswa (NIM)</label>
                <div class="input-wrapper">
                    <span class="material-icons-outlined input-icon">person_outline</span>
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
                <label class="form-label" for="password">
                    Kata Sandi
                    <a href="#" onclick="return false;">Lupa Sandi?</a>
                </label>
                <div class="input-wrapper">
                    <span class="material-icons-outlined input-icon">lock_outline</span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
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



            {{-- Submit --}}
            <button type="submit" class="btn-submit" id="btn-login">Masuk Ke Sistem</button>
        </form>

        <p class="auth-switch">
            Belum memiliki akun? <a href="{{ route('register') }}">Daftar Akun</a>
        </p>

        <div class="auth-help">
            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #25d366;"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                Pusat Bantuan
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
