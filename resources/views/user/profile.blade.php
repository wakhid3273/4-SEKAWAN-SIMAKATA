<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Profil Mahasiswa SIMAKATA">
    <title>Profil - SIMAKATA</title>
    
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
            <span class="text-2xl font-extrabold tracking-wider text-[#0a3d6b]">SIMAKATA<br><span class="text-xs text-slate-400 font-normal tracking-normal block mt-1">Academic Management</span></span>
            <button id="mobile-menu-close" class="md:hidden p-1.5 rounded-lg hover:bg-slate-200 text-slate-500 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Sidebar User Profile Info - Hide on profile page to match image -->
        <!-- <div class="px-6 py-5 border-b border-slate-100">...</div> -->

        <!-- Sidebar Navigation Menu -->
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-950 font-medium transition duration-150">
                <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="text-sm">Dashboard</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-950 font-medium transition duration-150">
                <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="text-sm">Input KP/Magang</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-950 font-medium transition duration-150">
                <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="text-sm">Input Tugas Akhir</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-950 font-medium transition duration-150">
                <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="text-sm">Rekomendasi Lokasi</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-slate-950 font-medium transition duration-150">
                <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm">Riwayat Aktivitas</span>
            </a>

            <a href="{{ route('user.profil') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-[#2563eb]/10 text-[#0755a6] border-r-2 border-[#0755a6] font-semibold transition duration-150">
                <svg class="w-5 h-5 shrink-0 text-[#0755a6]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-sm">Profil</span>
            </a>
        </nav>

        <!-- Sidebar Bottom: New Request / Logout -->
        <div class="p-4 mt-auto">
            <a href="#" class="w-full flex justify-center items-center gap-2 px-4 py-2.5 rounded-lg bg-[#0755a6] text-white hover:bg-[#064282] font-semibold transition duration-150 shadow-sm text-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                New Request
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 text-slate-500 hover:text-red-600 text-sm font-medium transition duration-150">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MOBILE SIDEBAR BACKDROP -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/40 z-30 hidden transition-opacity duration-300 ease-in-out md:hidden"></div>

    <!-- MAIN CONTENT AREA -->
    <div class="flex-1 flex flex-col min-w-0 min-h-screen overflow-y-auto bg-slate-50">
        
        <!-- TOP NAVBAR / SEARCH -->
        <header class="hidden md:flex items-center justify-between px-8 py-4 bg-white border-b border-slate-200 shrink-0">
            <div class="flex-1 max-w-xl relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-slate-200 rounded-lg leading-5 bg-slate-50 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0755a6] focus:border-[#0755a6] sm:text-sm transition duration-150 ease-in-out" placeholder="Cari aktivitas atau dokumen...">
            </div>
            
            <div class="flex items-center gap-5 ml-4">
                <!-- Add Task Icon -->
                <button class="text-slate-400 hover:text-slate-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </button>
                <!-- Notifications Bell -->
                <button class="relative text-slate-400 hover:text-slate-600 transition" aria-label="Notifications">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <span class="absolute top-0 right-0 block w-1.5 h-1.5 rounded-full bg-red-500 ring-2 ring-white"></span>
                </button>
                
                <div class="h-6 w-px bg-slate-200"></div>
                
                <!-- Profile Pic -->
                <div class="flex items-center gap-3">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-semibold text-slate-700 leading-tight">{{ $user->nama_lengkap ?? 'User' }}</p>
                        <p class="text-[11px] text-slate-500">Mahasiswa</p>
                    </div>
                    <img class="w-9 h-9 rounded-full object-cover shadow-sm ring-2 ring-slate-100" 
                         src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=150&q=80" 
                         alt="Profile">
                </div>
            </div>
        </header>

        <!-- MAIN VIEW PORTION -->
        <main class="flex-1 px-4 py-6 md:px-8 max-w-7xl mx-auto w-full">
            
            <!-- Profile Header Card -->
            <div class="rounded-2xl bg-[#0a55a6] text-white overflow-hidden shadow-sm mb-6 relative">
                <!-- Decorative background pattern (optional) -->
                <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iMiIgZmlsbD0iI0ZGRiIvPjwvc3ZnPg==')]"></div>
                
                <div class="relative z-10 p-6 md:p-8 flex flex-col md:flex-row items-center md:items-end gap-6">
                    <!-- Avatar -->
                    <div class="relative shrink-0">
                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=150&q=80" 
                             alt="Avatar" class="w-32 h-32 rounded-2xl object-cover border-4 border-white shadow-md">
                        <div class="absolute -bottom-2 -right-2 bg-white rounded-lg p-1.5 shadow-sm">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    
                    <!-- Info -->
                    <div class="flex-1 text-center md:text-left mb-2">
                        <div class="flex flex-col md:flex-row md:items-center gap-3 mb-2">
                            <h2 class="text-2xl font-bold tracking-tight">{{ $user->nama_lengkap ?? 'Nama Belum Diatur' }}</h2>
                            @if($user->status_akademik === 'Aktif')
                                <span class="px-3 py-1 text-xs font-bold bg-[#ffc107] text-slate-900 rounded-full inline-block">{{ $user->status_akademik }} Akademik</span>
                            @else
                                <span class="px-3 py-1 text-xs font-bold bg-slate-200 text-slate-800 rounded-full inline-block">{{ $user->status_akademik ?? '-' }}</span>
                            @endif
                        </div>
                        <div class="flex items-center justify-center md:justify-start gap-2 text-blue-100 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                            <span>NIM: {{ $user->nim }}</span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <button class="flex-1 md:flex-none flex items-center justify-center gap-2 px-5 py-2.5 bg-white text-[#0a55a6] font-semibold text-sm rounded-lg hover:bg-slate-50 transition shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            Edit Profil
                        </button>
                        <button class="flex-1 md:flex-none flex items-center justify-center gap-2 px-5 py-2.5 bg-[#084282] text-white font-semibold text-sm rounded-lg hover:bg-[#063366] transition shadow-sm border border-[#0a55a6]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                            Bagikan Profil
                        </button>
                    </div>
                </div>
            </div>

            <!-- Dashboard Grid -->
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- LEFT COLUMN -->
                <div class="w-full lg:w-2/3 flex flex-col gap-6">
                    
                    <!-- Informasi Akademik -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                            <h3 class="font-bold text-slate-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#0a55a6]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                Informasi Akademik
                            </h3>
                            <a href="#" class="text-xs font-semibold text-[#0a55a6] hover:underline">Lihat Detail Kurikulum</a>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">NAMA LENGKAP</p>
                                    <p class="font-semibold text-slate-900">{{ $user->nama_lengkap ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">NIM</p>
                                    <p class="font-semibold text-slate-900">{{ $user->nim }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">ANGKATAN</p>
                                    <p class="font-semibold text-slate-900">{{ $user->angkatan ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">PROGRAM STUDI</p>
                                    <p class="font-semibold text-slate-900">{{ $user->program_studi ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">SEMESTER AKTIF</p>
                                    <p class="font-semibold text-slate-900">{{ $user->semester_aktif ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">STATUS AKADEMIK</p>
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full {{ $user->status_akademik === 'Aktif' ? 'bg-emerald-500' : 'bg-red-500' }}"></span>
                                        <p class="font-semibold text-slate-900">{{ $user->status_akademik ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics / Pengajuan -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Total KP -->
                        <div class="bg-blue-50/50 rounded-xl border border-blue-100 p-5 flex flex-col hover:shadow-sm transition">
                            <div class="mb-3">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <span class="text-2xl font-bold text-slate-800">{{ $totalKpMagang }}</span>
                            <span class="text-xs font-medium text-slate-600 mt-1">Total<br>Pengajuan<br>KP/Magang</span>
                        </div>
                        
                        <!-- Total TA -->
                        <div class="bg-indigo-50/50 rounded-xl border border-indigo-100 p-5 flex flex-col hover:shadow-sm transition">
                            <div class="mb-3">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <span class="text-2xl font-bold text-slate-800">{{ $totalTugasAkhir }}</span>
                            <span class="text-xs font-medium text-slate-600 mt-1">Total<br>Pengajuan<br>Tugas Akhir</span>
                        </div>

                        <!-- Pending -->
                        <div class="bg-amber-50/50 rounded-xl border border-amber-100 p-5 flex flex-col hover:shadow-sm transition">
                            <div class="mb-3">
                                <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="text-2xl font-bold text-slate-800">{{ $pengajuanPending }}</span>
                            <span class="text-xs font-medium text-slate-600 mt-1">Pengajuan<br>Pending</span>
                        </div>

                        <!-- Approved -->
                        <div class="bg-emerald-50/50 rounded-xl border border-emerald-100 p-5 flex flex-col hover:shadow-sm transition">
                            <div class="mb-3">
                                <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="text-2xl font-bold text-slate-800">{{ $pengajuanDisetujui }}</span>
                            <span class="text-xs font-medium text-slate-600 mt-1">Pengajuan<br>Disetujui</span>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="w-full lg:w-1/3 flex flex-col gap-6">
                    
                    <!-- Informasi Kontak -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
                            <h3 class="font-bold text-slate-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#0a55a6]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                Informasi Kontak
                            </h3>
                        </div>
                        <div class="p-5 space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-medium text-slate-500 mb-0.5">Email Institusi</p>
                                    <p class="font-semibold text-slate-900 truncate text-sm">{{ $user->email ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-medium text-slate-500 mb-0.5">Nomor Telepon</p>
                                    <p class="font-semibold text-slate-900 text-sm">{{ $user->nomor_telepon ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Keamanan Akun -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
                            <h3 class="font-bold text-slate-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#0a55a6]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                Keamanan Akun
                            </h3>
                        </div>
                        <div class="p-5">
                            <div class="flex items-start gap-3 bg-slate-50 border border-slate-200 rounded-lg p-3 mb-5">
                                <svg class="w-5 h-5 text-slate-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <p class="text-sm font-medium text-slate-600">Terakhir Login: <br><span class="font-bold text-slate-800">{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : '-' }}</span></p>
                            </div>
                            
                            <button class="w-full flex justify-center items-center gap-2 px-4 py-2.5 border border-[#0a55a6] text-[#0a55a6] hover:bg-blue-50 font-semibold rounded-lg transition duration-150 text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                                Ubah Password
                            </button>
                            <p class="text-xs text-center text-slate-400 mt-3 px-2 leading-relaxed">Disarankan untuk mengubah password secara berkala setiap 6 bulan.</p>
                        </div>
                    </div>

                    <!-- Bantuan -->
                    <div class="bg-[#0a55a6] rounded-xl text-white p-5 shadow-sm relative overflow-hidden">
                        <!-- BG pattern -->
                        <div class="absolute -right-4 -bottom-4 opacity-10">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11v6h2v-6h-2zm0-4v2h2V7h-2z"></path></svg>
                        </div>
                        
                        <div class="relative z-10">
                            <h3 class="font-bold text-lg mb-2">Butuh Bantuan?</h3>
                            <p class="text-sm text-blue-100 leading-relaxed mb-4">Hubungi tim IT Support jika Anda mengalami kendala pada akun akademik Anda.</p>
                            <a href="#" class="inline-flex items-center gap-2 text-sm font-bold text-[#ffc107] hover:text-white transition">
                                Hubungi Support
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

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
