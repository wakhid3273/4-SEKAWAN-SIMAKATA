<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard Mahasiswa SIMAKATA - Monitoring Kemajuan Akademik">
    <title>Dashboard - SIMAKATA</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="h-full text-slate-800 antialiased flex flex-col md:flex-row">

    <!-- MOBILE HEADER -->
    <div class="md:hidden flex items-center justify-between bg-white px-4 py-3 border-b border-slate-200 sticky top-0 z-50">
        <div class="flex items-center gap-2">
            <span class="text-xl font-bold tracking-wider text-[#0a3d6b]">SIMAKATA</span>
        </div>
        <button id="mobile-menu-toggle" class="p-2 rounded-lg hover:bg-slate-100 focus:outline-none" aria-label="Toggle Menu">
            <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- SIDEBAR -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-[#f8fafc] border-r border-slate-200 transform -translate-x-full transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:flex md:flex-col h-full shrink-0">
        <!-- Sidebar Brand -->
        <div class="px-6 py-6 border-b border-slate-100 flex items-center justify-between">
            <span class="text-2xl font-extrabold tracking-wider text-[#0a3d6b]">SIMAKATA</span>
            <button id="mobile-menu-close" class="md:hidden p-1.5 rounded-lg hover:bg-slate-200 text-slate-500 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Sidebar User Profile Info -->
        <div class="px-6 py-5 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-[#1e68d7]/10 flex items-center justify-center shrink-0 border border-[#1e68d7]/20 text-[#1e68d7]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="overflow-hidden">
                    <h4 class="font-semibold text-slate-900 leading-tight truncate">Mahasiswa Panel</h4>
                    <p class="text-[10px] font-bold tracking-wider text-slate-400 mt-0.5 uppercase truncate">INFORMATICS STUDENT</p>
                </div>
            </div>
        </div>

        <!-- Sidebar Navigation Menu -->
        <nav class="flex-1 px-4 py-4 space-y-1.5 overflow-y-auto">
            <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-[#2563eb] text-white font-medium shadow-sm transition duration-150">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="text-sm">Dashboard</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-950 font-medium transition duration-150">
                <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="text-sm">Input Tugas Akhir</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-950 font-medium transition duration-150">
                <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm">Riwayat Aktivitas</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-950 font-medium transition duration-150">
                <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-sm">Profil</span>
            </a>
        </nav>

        <!-- Sidebar Bottom: Logout -->
        <div class="p-4 border-t border-slate-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-500 hover:bg-red-50 hover:text-red-600 font-medium transition duration-150 text-left">
                    <svg class="w-5 h-5 shrink-0 text-slate-400 hover:text-red-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="text-sm">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- MOBILE SIDEBAR BACKDROP -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/40 z-30 hidden transition-opacity duration-300 ease-in-out md:hidden"></div>

    <!-- MAIN CONTENT AREA -->
    <div class="flex-1 flex flex-col min-w-0 min-h-screen overflow-y-auto">
        
        <!-- TOP NAVBAR -->
        <header class="hidden md:flex items-center justify-between px-8 py-5 bg-transparent shrink-0">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Dashboard</h1>
                <p class="text-xs text-slate-500 mt-1">Monitoring kemajuan akademik Anda secara real-time.</p>
            </div>
            
            <div class="flex items-center gap-4">
                <!-- Notifications Bell -->
                <button class="relative p-2 text-slate-400 hover:text-slate-600 bg-white border border-slate-200 rounded-full hover:shadow-sm focus:outline-none transition duration-150" aria-label="Notifications">
                    <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <span class="absolute top-1.5 right-1.5 block w-2 h-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                </button>
                
                <!-- Profile Pic -->
                <div class="flex items-center gap-2">
                    <img class="w-10 h-10 rounded-full object-cover border border-slate-200 shadow-sm" 
                         src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=150&q=80" 
                         alt="Foto Profil Mahasiswa">
                </div>
            </div>
        </header>

        <!-- MAIN VIEW PORTION -->
        <main class="flex-1 px-4 py-6 md:px-8 md:py-2 max-w-6xl w-full mx-auto space-y-6">
            
            <!-- Mobile Page Title Block -->
            <div class="md:hidden px-2 py-1">
                <h1 class="text-xl font-bold text-slate-900">Dashboard</h1>
                <p class="text-xs text-slate-500 mt-1">Monitoring kemajuan akademik Anda secara real-time.</p>
            </div>

            <!-- WELCOME BANNER CARD -->
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#0755a6] to-[#0d71cd] text-white p-6 md:p-8 shadow-sm">
                <!-- Decorative background elements -->
                <div class="absolute -right-10 -top-10 w-40 h-40 rounded-full bg-white/5 pointer-events-none"></div>
                <div class="absolute -left-10 -bottom-10 w-60 h-60 rounded-full bg-white/5 pointer-events-none"></div>
                
                <div class="relative z-10 max-w-2xl">
                    <h2 class="text-xl md:text-2xl font-bold tracking-tight">Selamat Datang, Mahasiswa Informatika</h2>
                    <p class="text-sm text-white/80 mt-2 leading-relaxed">
                        Kelola Kerja Praktik, Magang, dan Tugas Akhir Anda dalam satu platform yang terintegrasi dan efisien.
                    </p>
                    <div class="flex flex-wrap gap-3 mt-6">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-white text-[#0755a6] font-semibold text-xs shadow-sm hover:bg-slate-50 transition duration-150">
                            Panduan TA
                        </a>
                        <a href="#" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-white text-[#0755a6] font-semibold text-xs shadow-sm hover:bg-slate-50 transition duration-150">
                            Panduan KP
                        </a>
                    </div>
                </div>
            </div>

            <!-- STATUS BOX CARD -->
            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm flex flex-col items-center justify-center text-center">
                
                @if($status_verifikasi === 'pending')
                    <!-- Waiting for Verification -->
                    <div class="w-14 h-14 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center text-amber-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0V9a2 2 0 00-2-2H6a2 2 0 00-2 2v2m15 4h-3a1 1 0 01-1-1V8m-8 7H5a1 1 0 01-1-1V8m6 7h2m-2-7h2"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-slate-900 leading-snug">Menunggu Verifikasi</h3>
                    <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mt-1">STATUS JUDUL TUGAS AKHIR</p>

                @elseif($status_verifikasi === 'approved')
                    <!-- Approved -->
                    <div class="w-14 h-14 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-slate-900 leading-snug">Judul TA Disetujui</h3>
                    <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mt-1">STATUS JUDUL TUGAS AKHIR</p>

                @elseif($status_verifikasi === 'rejected')
                    <!-- Rejected -->
                    <div class="w-14 h-14 rounded-xl bg-red-50 border border-red-200 flex items-center justify-center text-red-600 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-slate-900 leading-snug">Judul TA Ditolak</h3>
                    <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mt-1">STATUS JUDUL TUGAS AKHIR</p>

                @else
                    <!-- No final project yet -->
                    <div class="w-14 h-14 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-500 mb-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-slate-900 leading-snug">Belum Mengajukan Judul</h3>
                    <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mt-1">STATUS JUDUL TUGAS AKHIR</p>
                @endif
            </div>

            <!-- ACTIVITY FEED / LOG SECTION -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <!-- Section Header -->
                <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">
                    <h3 class="font-bold text-slate-900 text-base">Menunggu Verifikasi</h3>
                    <a href="#" class="text-xs font-semibold text-[#2563eb] hover:underline">Lihat Semua</a>
                </div>

                <!-- Feed Items -->
                <div class="divide-y divide-slate-100">
                    @foreach($riwayat_aktivitas as $aktivitas)
                        <div class="p-6 flex items-start gap-4 hover:bg-slate-50/80 transition duration-150">
                            @if(Str::contains(strtolower($aktivitas['judul']), 'setuju'))
                                <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            @elseif(Str::contains(strtolower($aktivitas['judul']), 'verifikasi'))
                                <div class="w-10 h-10 rounded-full bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                                    <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                </div>
                            @else
                                <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center shrink-0">
                                    <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="space-y-1">
                                <h4 class="font-bold text-slate-900 text-sm">{{ $aktivitas['judul'] }}</h4>
                                <p class="text-sm text-slate-500 leading-relaxed">
                                    {{ $aktivitas['deskripsi'] }}
                                </p>
                                <span class="inline-block text-[10px] font-bold tracking-wider text-slate-400 uppercase pt-1">{{ $aktivitas['waktu'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- FOOTER -->
            <footer class="pt-8 pb-12 border-t border-slate-200">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">
                    <!-- Brand info -->
                    <div class="space-y-3">
                        <h4 class="font-extrabold text-slate-900 tracking-wider">SIMAKATA</h4>
                        <p class="text-slate-500 leading-relaxed">
                            Sistem Informasi Mahasiswa Kerja Praktik & Tugas Akhir.
                        </p>
                    </div>
                    <!-- Help -->
                    <div class="space-y-3">
                        <h4 class="font-semibold text-slate-900">Pusat Bantuan</h4>
                        <ul class="space-y-2 text-slate-500">
                            <li><a href="#" class="hover:text-[#2563eb] transition duration-150">Panduan Pengguna</a></li>
                            <li><a href="#" class="hover:text-[#2563eb] transition duration-150">Kontak Admin Jurusan</a></li>
                        </ul>
                    </div>
                    <!-- Legal -->
                    <div class="space-y-3">
                        <h4 class="font-semibold text-slate-900">Legal</h4>
                        <ul class="space-y-2 text-slate-500">
                            <li><a href="#" class="hover:text-[#2563eb] transition duration-150">Kebijakan Privasi</a></li>
                            <li><a href="#" class="hover:text-[#2563eb] transition duration-150">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Copyright -->
                <div class="mt-8 pt-6 border-t border-slate-100 flex justify-center">
                    <p class="text-xs text-slate-400">&copy; 2024 HMIF Informatics SIMAKATA. All rights reserved.</p>
                </div>
            </footer>
        </main>
    </div>

    <!-- RESPONSIVE MOBILE MENU SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('mobile-menu-toggle');
            const menuClose = document.getElementById('mobile-menu-close');
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                backdrop.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden');
            }

            if (menuToggle) menuToggle.addEventListener('click', toggleSidebar);
            if (menuClose) menuClose.addEventListener('click', toggleSidebar);
            if (backdrop) backdrop.addEventListener('click', toggleSidebar);
        });
    </script>
</body>
</html>
