@extends('layouts.app')

@section('title', 'SIMAKATA - Landing Page')

@section('content')
<div class="landing-container">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand fw-bold" href="{{ route('landing') }}">SIMAKATA</a>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('landing') }}" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Perusahaan</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Judul TA</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Riwayat</a></li>

                    {{-- Jika tamu --}}
                    @guest
                        <li class="nav-item"><a href="{{ route('login.form') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register.form') }}" class="nav-link">Daftar</a></li>
                    @endguest

                    {{-- Jika sudah login --}}
                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="padding:0; border:none; background:none;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <header class="text-center my-4">
        <h1>SIMAKATA</h1>
        <p>Sistem Informasi Magang, Kerja Praktik, dan Tugas Akhir</p>
    </header>

    {{-- CTA untuk tamu --}}
    @guest
        <div class="cta text-center mb-4">
            <a href="{{ route('register.form') }}" class="btn btn-primary">Daftar Akun</a>
            <a href="{{ route('login.form') }}" class="btn btn-secondary">Login</a>
        </div>
    @endguest

    {{-- Statistik --}}
    <section class="stats text-center mb-4">
        <div>50+ Perusahaan Terdaftar</div>
        <div>120+ Mahasiswa Magang</div>
        <div>150+ Judul TA Selesai</div>
    </section>

    {{-- Fitur Utama --}}
    <section class="features mb-4">
        <h2>Fitur Utama Platform</h2>
        <ul>
            <li>Database Perusahaan</li>
            <li>Validasi Judul TA</li>
            <li>Rekomendasi Magang</li>
            <li>Riwayat Magang</li>
        </ul>
    </section>

    {{-- CTA Footer --}}
    <section class="cta-footer text-center mb-4">
        <h2>Siap Memulai Langkah Karir Anda?</h2>
        @guest
            <a href="{{ route('register.form') }}" class="btn btn-success">Daftar Sekarang</a>
            <a href="#" class="btn btn-outline-dark">Hubungi Admin</a>
        @endguest
        @auth
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @endauth
    </section>

    {{-- Footer Informasi --}}
    <footer class="footer text-center mt-4">
        <div class="footer-info">
            <p>&copy; {{ date('Y') }} SIMAKATA. Semua Hak Dilindungi.</p>
            <p>Kontak: simakata@example.com | Telp: 0812-3456-7890</p>
        </div>
        <div class="footer-links">
            <a href="#">Tentang Kami</a> |
            <a href="#">Kebijakan Privasi</a> |
            <a href="#">Bantuan</a>
        </div>
        <div class="footer-social">
            <span>Ikuti kami:</span>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">LinkedIn</a>
        </div>
    </footer>

</div>
@endsection
