@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-sm min-h-screen">
            <div class="p-6">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">S</span>
                    </div>
                    <div>
                        <h1 class="font-bold text-xl text-gray-900">SIMAKATA</h1>
                        <p class="text-xs text-gray-500">Sistem Manajemen</p>
                    </div>
                </div>

                <nav class="space-y-1">
                    <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('user.kp-magang.create') }}" class="flex items-center gap-3 px-4 py-3 text-white bg-blue-600 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Input KP/Magang</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span>Input Tugas Akhir</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Riwayat dan Lokasi</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <span>Analisis Aktivitas</span>
                    </a>

                    <a href="{{ route('user.profil') }}" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>Profil</span>
                    </a>
                </nav>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1">
            {{-- Header --}}
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-8 py-4">
                    <div class="flex-1 max-w-md">
                        <div class="relative">
                            <input type="text" placeholder="Search activities..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <button class="p-2 hover:bg-gray-100 rounded-lg">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </button>
                        <button class="p-2 hover:bg-gray-100 rounded-lg">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </button>
                        <div class="flex items-center gap-3">
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->nama_lengkap }}</p>
                                <p class="text-xs text-gray-500">Mahasiswa</p>
                            </div>
                            <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->nama_lengkap).'&background=0D6EFD&color=fff' }}" 
                                 alt="Avatar" 
                                 class="w-10 h-10 rounded-full">
                        </div>
                    </div>
                </div>
            </header>

            {{-- Content --}}
            <div class="p-8">
                <div class="max-w-4xl">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Pengajuan KP/Magang</h1>
                    <p class="text-gray-600 mb-8">Silakan lengkapi data berikut untuk mengajukan administrasi Kerja Praktik atau Magang Anda.</p>

                    {{-- Progress Steps --}}
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-lg">1</div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-900">Pengajuan</p>
                            </div>
                        </div>
                        <div class="flex-1 h-1 bg-gray-200 mx-4"></div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold text-lg">2</div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-500">Dokumen</p>
                            </div>
                        </div>
                        <div class="flex-1 h-1 bg-gray-200 mx-4"></div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold text-lg">3</div>
                            <div class="ml-3">
                                <p class="font-semibold text-gray-500">Konfirmasi</p>
                            </div>
                        </div>
                    </div>

                    {{-- Info Box --}}
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-8 flex gap-3">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-blue-900 mb-1">Petunjuk Pengisian</h3>
                            <p class="text-sm text-blue-800">Pastikan nama pengajuan sesuai dengan data terdaftar. Unggah dokumen dalam format PDF dengan ukuran maksimal 2MB per file.</p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('user.kp-magang.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                        @csrf

                        <div class="grid grid-cols-2 gap-6 mb-6">
                            {{-- Jenis Kegiatan --}}
                            <div class="col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">JENIS KEGIATAN *</label>
                                <div class="flex gap-4">
                                    <label class="flex-1">
                                        <input type="radio" name="kegiatan" value="Kerja Praktik" class="peer sr-only" required checked>
                                        <div class="px-6 py-3 border-2 border-gray-300 rounded-lg text-center cursor-pointer peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 hover:border-blue-400 transition">
                                            <span class="font-semibold">Kerja Praktik</span>
                                        </div>
                                    </label>
                                    <label class="flex-1">
                                        <input type="radio" name="kegiatan" value="Magang" class="peer sr-only" required>
                                        <div class="px-6 py-3 border-2 border-gray-300 rounded-lg text-center cursor-pointer peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 hover:border-blue-400 transition">
                                            <span class="font-semibold">Magang</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            {{-- Nama Perusahaan --}}
                            <div class="col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">NAMA PERUSAHAAN *</label>
                                <select name="perusahaan_id" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Pilih Perusahaan dan Lokasi</option>
                                    @foreach($perusahaan as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }} - {{ $p->lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- NIM --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">NIM / NISN *</label>
                                <input type="text" name="nim" value="{{ $user->nim }}" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: E020180001">
                            </div>

                            {{-- Bidang/Divisi --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">BIDANG / DIVISI *</label>
                                <input type="text" name="angkatan" value="{{ $user->angkatan }}" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Product & Technology">
                            </div>

                            {{-- Periode Memulai --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">PERIODE MEMULAI *</label>
                                <input type="date" name="periode" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            {{-- Periode Selesai --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">SELESAI *</label>
                                <input type="date" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            {{-- Nama Lengkap (hidden, auto dari user) --}}
                            <input type="hidden" name="nama" value="{{ $user->nama_lengkap }}">
                        </div>

                        {{-- Upload Dokumen --}}
                        <div class="border-t pt-6 mb-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">UPLOAD DOKUMEN PENDUKUNG</h3>
                            
                            <div class="grid grid-cols-3 gap-4">
                                {{-- CV/Resume --}}
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition">
                                    <label class="cursor-pointer">
                                        <input type="file" name="cv_file" accept=".pdf" required class="hidden" onchange="updateFileName(this, 'cv-name')">
                                        <svg class="w-12 h-12 text-blue-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <p class="font-semibold text-gray-900 mb-1">CV/Resume</p>
                                        <p class="text-xs text-gray-500 mb-2" id="cv-name">File: PDF, Max 2MB</p>
                                        <span class="text-blue-600 text-sm">Upload File</span>
                                    </label>
                                </div>

                                {{-- Transkrip Nilai --}}
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition">
                                    <label class="cursor-pointer">
                                        <input type="file" name="transkrip_file" accept=".pdf" required class="hidden" onchange="updateFileName(this, 'transkrip-name')">
                                        <svg class="w-12 h-12 text-blue-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <p class="font-semibold text-gray-900 mb-1">Transkrip Nilai</p>
                                        <p class="text-xs text-gray-500 mb-2" id="transkrip-name">File: PDF, Max 2MB</p>
                                        <span class="text-blue-600 text-sm">Upload File</span>
                                    </label>
                                </div>

                                {{-- Portofolio/Sertifikat --}}
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition">
                                    <label class="cursor-pointer">
                                        <input type="file" name="portofolio_file" accept=".pdf" class="hidden" onchange="updateFileName(this, 'porto-name')">
                                        <svg class="w-12 h-12 text-blue-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <p class="font-semibold text-gray-900 mb-1">Portofolio/Sertifikat</p>
                                        <p class="text-xs text-gray-500 mb-2" id="porto-name">File: PDF, Max 2MB</p>
                                        <span class="text-blue-600 text-sm">Upload File</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Form Actions --}}
                        <div class="flex justify-between items-center">
                            <a href="{{ route('user.dashboard') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
                                Simpan Draft
                            </a>
                            <button type="submit" class="px-8 py-2.5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
                                Lanjutkan
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
function updateFileName(input, elementId) {
    const fileName = input.files[0]?.name || 'File: PDF, Max 2MB';
    document.getElementById(elementId).textContent = fileName;
}
</script>
@endsection
