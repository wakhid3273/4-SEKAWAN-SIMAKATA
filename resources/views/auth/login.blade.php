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

            {{-- Email --}}
            <div class="form-group">
                <label class="form-label" for="email">Email Mahasiswa</label>
                <div class="input-wrapper">
                    <span class="material-icons-outlined input-icon">email</span>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="NIM@mhs.unsoed.ac.id"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                    >
                </div>
                @error('email')
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
                    <a href="{{ route('password.request') }}">Lupa Sandi?</a>
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
            <a href="https://wa.me/6281234567890" target="_blank">
                <span class="material-icons-outlined">chat</span>
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
