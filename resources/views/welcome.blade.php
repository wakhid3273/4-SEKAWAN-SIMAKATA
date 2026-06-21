<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Point 1: Meta Viewport -->
    <title>{{ config('app.name', 'SIMAKATA') }}</title>

    <!-- Point 5: Tipografi (Font Sans yang Modern) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Using Tailwind CDN for development if Vite is not running -->
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    
    <!-- Alpine.js untuk fitur Hamburger Menu (Point 7) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Point 7: Navigasi Adaptif (Hamburger Menu) -->
    <nav x-data="{ open: false }" class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> <!-- Point 6: Padding Proporsional -->
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-2xl font-bold text-blue-600">SIMAKATA</a>
                </div>

                <!-- Desktop Menu (Disembunyikan di HP, ditampilkan di layar md ke atas - Point 2) -->
                <div class="hidden md:flex md:items-center md:space-x-8"> 
                    <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">Beranda</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">Tentang</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">Layanan</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">Kontak</a>
                    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:text-blue-800 transition">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition shadow-sm">Daftar</a>
                            @endif
                        @endauth
                    @endif
                </div>

                <!-- Tombol Hamburger untuk Mobile (Ditampilkan di HP, disembunyikan di layar md ke atas - Point 2 & 7) -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition" aria-label="Main menu">
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Mobile Panel -->
        <div x-show="open" x-transition class="md:hidden border-t border-gray-200 bg-white" style="display: none;">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-blue-700 bg-blue-50 border-l-4 border-blue-500">Beranda</a>
                <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 border-l-4 border-transparent transition">Tentang</a>
                <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 border-l-4 border-transparent transition">Layanan</a>
                
                @if (Route::has('login'))
                    <div class="border-t border-gray-200 my-2"></div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-blue-600">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-blue-600">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-blue-600">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Point 3: Grid/Flexbox Layout -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 lg:py-24">
        <!-- Hero Section (Menggunakan Grid: 1 kolom di HP, 2 kolom di md ke atas) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
            
            <!-- Konten Teks -->
            <div class="flex flex-col justify-center space-y-6 order-2 md:order-1"> <!-- Di HP teks di bawah gambar, di Desktop teks di kiri -->
                <!-- Point 5: Tipografi Responsif -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight tracking-tight">
                    Sistem Informasi <br class="hidden sm:block"> <span class="text-blue-600">Magang & TA</span>
                </h1>
                <p class="text-base sm:text-lg lg:text-xl text-gray-600 max-w-lg">
                    Temukan kemudahan dalam mengelola administrasi Kerja Praktik dan Tugas Akhir Anda dalam satu platform yang responsif dan terintegrasi.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 pt-2">
                    <a href="#" class="w-full sm:w-auto text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg shadow-md transition transform hover:-translate-y-0.5">
                        Mulai Sekarang
                    </a>
                    <a href="#" class="w-full sm:w-auto text-center bg-white hover:bg-gray-50 text-blue-600 border border-blue-600 font-semibold py-3 px-8 rounded-lg shadow-sm transition">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

            <!-- Konten Gambar (Point 4: Media Fleksibel) -->
            <div class="flex justify-center md:justify-end order-1 md:order-2 mb-8 md:mb-0">
                <!-- Gambar otomatis mengecil di HP karena class w-full max-w-sm -->
                <img src="https://illustrations.popsy.co/blue/freelancer.svg" alt="Ilustrasi SIMAKATA" class="w-full max-w-sm md:max-w-md lg:max-w-lg h-auto drop-shadow-xl hover:scale-105 transition duration-500">
            </div>

        </div>

        <!-- Section Fitur Tambahan -->
        <div class="mt-20 md:mt-32">
            <h2 class="text-2xl sm:text-3xl font-bold text-center text-gray-900 mb-10 md:mb-14">Mengapa Memilih SIMAKATA?</h2>
            
            <!-- Menggunakan Grid untuk menampilkan kartu secara responsif -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Cepat & Efisien</h3>
                    <p class="text-gray-600 leading-relaxed">Proses pengajuan dan verifikasi yang lebih ringkas dan hemat waktu bagi mahasiswa dan dosen.</p>
                </div>
                
                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Sangat Responsif</h3>
                    <p class="text-gray-600 leading-relaxed">Akses platform kami dari perangkat mana pun, ponsel atau tablet, dengan tampilan antarmuka sempurna.</p>
                </div>
                
                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition duration-300 transform hover:-translate-y-1 sm:col-span-2 lg:col-span-1">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Aman Terlindungi</h3>
                    <p class="text-gray-600 leading-relaxed">Keamanan data akademik terjamin dengan sistem enkripsi canggih dan otorisasi terstruktur.</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0 text-center md:text-left">
                <span class="text-xl font-bold text-blue-600">SIMAKATA</span>
                <p class="text-gray-500 text-sm mt-1">
                    &copy; {{ date('Y') }} Sistem Informasi Magang & TA. All rights reserved.
                </p>
            </div>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-blue-600 transition">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-900 transition">
                    <span class="sr-only">GitHub</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                </a>
            </div>
        </div>
    </footer>

</body>
</html>
