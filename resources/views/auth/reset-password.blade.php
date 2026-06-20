@extends('layouts.auth')

@section('title', 'Reset Password - SIMAKATA')

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

    {{-- RIGHT: Reset Form --}}
    <div class="auth-form-panel">
        <h1>Reset Kata Sandi</h1>
        <p class="subtitle">Masukkan email Anda dan kata sandi baru untuk mengatur ulang akses Anda.</p>

        {{-- Error Message --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <span class="material-icons-outlined" style="font-size:18px;">error</span>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.reset') }}" id="reset-form">
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
                    >
                </div>
            </div>

            {{-- New Password --}}
            <div class="form-group">
                <label class="form-label" for="password">Kata Sandi Baru</label>
                <div class="input-wrapper">
                    <span class="material-icons-outlined input-icon">lock_outline</span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimal 6 karakter"
                        required
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
                        <span class="material-icons-outlined">visibility</span>
                    </button>
                </div>
            </div>

            {{-- Confirm Password --}}
            <div class="form-group">
                <label class="form-label" for="password_confirmation">Konfirmasi Kata Sandi Baru</label>
                <div class="input-wrapper">
                    <span class="material-icons-outlined input-icon">lock_outline</span>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Ulangi kata sandi baru"
                        required
                    >
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-submit" id="btn-reset">Reset Kata Sandi</button>
        </form>

        <p class="auth-switch">
            Ingat kata sandi Anda? <a href="{{ route('login') }}">Masuk</a>
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
