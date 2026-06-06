@extends('layouts.app')

@section('title', 'SIMAKATA - Landing Page')

@section('content')
<div class="landing-container">

    {{-- Navbar --}}
    <nav>
        <ul>
            <li><a href="{{ route('landing') }}">Beranda</a></li>
            <li><a href="#">Perusahaan</a></li>
            <li><a href="#">Judul TA</a></li>
            <li><a href="#">Riwayat</a></li>

            {{-- Jika tamu --}}
            @guest
                <li><a href="{{ route('login.form') }}">Login</a></li>
                <li><a href="{{ route('register.form') }}">Daftar</a></li>
            @endguest

            {{-- Jika sudah login --}}
            @auth
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>

    {{-- Hero Section --}}
    <header>
        <h1>SIMAKATA</h1>
        <p>Sistem Informasi Magang, Kerja Praktik, dan Tugas Akhir</p>
    </header>

    {{-- CTA untuk tamu --}}
    @guest
        <div class="cta">
            <a href="{{ route('register.form') }}" class="btn">Daftar Akun</a>
            <a href="{{ route('login.form') }}" class="btn">Login</a>
        </div>
    @endguest

    {{-- Statistik --}}
    <section class="stats">
        <div>50+ Perusahaan Terdaftar</div>
        <div>120+ Mahasiswa Magang</div>
        <div>150+ Judul TA Selesai</div>
    </section>

    {{-- Fitur Utama --}}
    <section class="features">
        <h2>Fitur Utama Platform</h2>
        <ul>
            <li>Database Perusahaan</li>
            <li>Validasi Judul TA</li>
            <li>Rekomendasi Magang</li>
            <li>Riwayat Magang</li>
        </ul>
    </section>

    {{-- CTA Footer --}}
    <section class="cta-footer">
        <h2>Siap Memulai Langkah Karir Anda?</h2>
        @guest
            <a href="{{ route('register.form') }}" class="btn">Daftar Sekarang</a>
            <a href="#" class="btn">Hubungi Admin</a>
        @endguest
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn">Logout</button>
            </form>
        @endauth
    </section>

    {{-- Footer Informasi --}}
    <footer class="footer">
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
