<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Perusahaan - SIMAKATA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Animations CSS -->
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* ===== RESET & BASE ===== */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --blue-dark:  #0a3d6b;
            --blue-main:  #1a5fb4;
            --blue-mid:   #2563eb;
            --blue-light: #dbeafe;
            --blue-pale:  #eff6ff;
            --accent:     #f4a807;
            --green:      #10b981;
            --green-light:#d1fae5;
            --text-dark:  #0f172a;
            --text-mid:   #334155;
            --text-gray:  #64748b;
            --text-light: #94a3b8;
            --border:     #e2e8f0;
            --bg-page:    #f8fafc;
            --white:      #ffffff;
            --radius-sm:  8px;
            --radius-md:  14px;
            --radius-lg:  20px;
            --shadow-sm:  0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
            --shadow-md:  0 4px 20px rgba(0,0,0,0.08);
            --shadow-lg:  0 20px 60px rgba(0,0,0,0.10);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--text-dark);
            background: var(--bg-page);
            line-height: 1.6;
            overflow-x: hidden;
        }

        a { text-decoration: none; color: inherit; }
        img { max-width: 100%; display: block; }

        /* ===== NAVBAR ===== */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 999;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(226,232,240,0.6);
            padding: 0 40px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: box-shadow 0.3s;
        }
        .navbar.scrolled { box-shadow: 0 2px 20px rgba(0,0,0,0.08); }

        .navbar-logo {
            font-size: 18px;
            font-weight: 800;
            color: var(--blue-main);
            letter-spacing: 1.5px;
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 32px;
            list-style: none;
        }
        .navbar-links a {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-mid);
            transition: color 0.2s;
            position: relative;
            padding-bottom: 2px;
        }
        .navbar-links a.active,
        .navbar-links a:hover {
            color: var(--blue-main);
        }
        .navbar-links a.active::after {
            width: 100%;
        }
        .navbar-links a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--blue-main);
            border-radius: 99px;
            transition: width 0.25s;
        }

        .navbar-auth {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--blue-main);
            color: var(--white);
        }
        .btn-primary:hover {
            background: var(--blue-dark);
            box-shadow: var(--shadow-md);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--blue-main);
            border: 2px solid var(--blue-main);
        }
        .btn-secondary:hover {
            background: var(--blue-pale);
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            background: linear-gradient(135deg, #0a3d6b 0%, #1a5fb4 100%);
            padding: 60px 40px 80px;
            color: var(--white);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 16px;
            opacity: 0.95;
            line-height: 1.6;
        }

        /* ===== FILTERS SECTION ===== */
        .filters-section {
            background: var(--white);
            padding: 32px 40px;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 64px;
            z-index: 99;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .filters-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: var(--bg-page);
            border: 2px solid var(--border);
            border-radius: var(--radius-md);
            padding: 12px 20px;
            margin-bottom: 20px;
            transition: all 0.2s;
        }

        .search-bar:focus-within {
            border-color: var(--blue-main);
            box-shadow: 0 0 0 3px var(--blue-pale);
        }

        .search-bar .material-icons-outlined {
            color: var(--text-gray);
            margin-right: 12px;
        }

        .search-bar input {
            border: none;
            background: transparent;
            flex: 1;
            font-size: 15px;
            outline: none;
            color: var(--text-dark);
        }

        .search-bar input::placeholder {
            color: var(--text-light);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-mid);
        }

        .filter-select {
            padding: 12px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius-sm);
            font-size: 14px;
            background: var(--white);
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--blue-main);
            box-shadow: 0 0 0 3px var(--blue-pale);
        }

        .btn-filter {
            padding: 12px 24px;
            background: var(--blue-main);
            color: var(--white);
            border: none;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-filter:hover {
            background: var(--blue-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        /* ===== COMPANIES GRID ===== */
        .companies-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 48px 40px;
        }

        .companies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 24px;
            margin-bottom: 48px;
        }

        .company-card {
            background: var(--white);
            border-radius: var(--radius-md);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s;
            border: 1px solid var(--border);
            display: flex;
            flex-direction: column;
        }

        .company-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--blue-light);
        }

        .company-header {
            display: flex;
            gap: 16px;
            margin-bottom: 16px;
        }

        .company-logo {
            width: 64px;
            height: 64px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--blue-pale);
            color: var(--blue-main);
            font-size: 24px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .company-info {
            flex: 1;
        }

        .company-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .company-location {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 13px;
            color: var(--text-gray);
        }

        .company-location .material-icons-outlined {
            font-size: 16px;
        }

        .company-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-magang {
            background: var(--blue-pale);
            color: var(--blue-main);
        }

        .badge-kp {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-ta {
            background: #ddd6fe;
            color: #5b21b6;
        }

        .badge-open {
            background: var(--green-light);
            color: var(--green);
        }

        .company-description {
            font-size: 14px;
            color: var(--text-gray);
            line-height: 1.6;
            margin-bottom: 16px;
            flex: 1;
        }

        .company-stats {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 14px;
            color: var(--text-mid);
            padding: 12px 0;
            border-top: 1px solid var(--border);
            margin-bottom: 16px;
        }

        .company-stats .material-icons-outlined {
            font-size: 18px;
            color: var(--blue-main);
        }

        .company-footer {
            margin-top: auto;
        }

        .btn-detail {
            width: 100%;
            padding: 12px;
            background: var(--blue-main);
            color: var(--white);
            border: none;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-detail:hover {
            background: var(--blue-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-state .material-icons-outlined {
            font-size: 80px;
            color: var(--text-light);
            margin-bottom: 16px;
        }

        .empty-state h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-mid);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 14px;
            color: var(--text-gray);
        }

        /* ===== PAGINATION ===== */
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 24px 0;
        }

        .pagination-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            background: var(--white);
            color: var(--text-mid);
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .pagination-btn:hover:not(.disabled) {
            background: var(--blue-pale);
            border-color: var(--blue-main);
            color: var(--blue-main);
        }

        .pagination-btn.active {
            background: var(--blue-main);
            border-color: var(--blue-main);
            color: var(--white);
        }

        .pagination-btn.disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .pagination-dots {
            padding: 0 8px;
            color: var(--text-light);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .companies-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0 20px;
            }

            .navbar-links {
                display: none;
            }

            .hero-section {
                padding: 40px 20px 60px;
            }

            .hero-content h1 {
                font-size: 32px;
            }

            .filters-section {
                padding: 20px;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .companies-section {
                padding: 32px 20px;
            }

            .companies-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    @include('components.navbar')

    {{-- ===== HERO SECTION ===== --}}
    <section class="hero-section">
        <div class="hero-content">
            <h1>Eksplorasi Mitra Industri</h1>
            <p>Temukan perusahaan terbaik untuk Kerja Praktik, Magang, dan penelitian Tugas Akhir Anda dalam jaringan ekosistem Informatika.</p>
        </div>
    </section>

    {{-- ===== FILTERS SECTION ===== --}}
    <section class="filters-section">
        <div class="filters-container">
            <form method="GET" action="{{ route('perusahaan.index') }}">
                {{-- Search Bar --}}
                <div class="search-bar">
                    <span class="material-icons-outlined">search</span>
                    <input 
                        type="text" 
                        name="q" 
                        placeholder="Cari nama perusahaan atau keyword..." 
                        value="{{ request('q') }}"
                    >
                </div>

                {{-- Filter Grid --}}
                <div class="filter-grid">
                    {{-- Filter Jenis Kegiatan --}}
                    <div class="filter-group">
                        <label>Jenis Kegiatan</label>
                        <select name="jenis_kegiatan" class="filter-select">
                            <option value="Semua Kegiatan" {{ request('jenis_kegiatan') == 'Semua Kegiatan' || !request('jenis_kegiatan') ? 'selected' : '' }}>
                                Semua Kegiatan
                            </option>
                            @foreach($jenisKegiatan as $jk)
                                <option value="{{ $jk }}" {{ request('jenis_kegiatan') == $jk ? 'selected' : '' }}>
                                    {{ $jk }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filter Lokasi --}}
                    <div class="filter-group">
                        <label>Lokasi</label>
                        <select name="lokasi" class="filter-select">
                            <option value="Semua Lokasi" {{ request('lokasi') == 'Semua Lokasi' || !request('lokasi') ? 'selected' : '' }}>
                                Semua Lokasi
                            </option>
                            @foreach($lokasiList as $lok)
                                <option value="{{ $lok }}" {{ request('lokasi') == $lok ? 'selected' : '' }}>
                                    {{ $lok }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filter Button --}}
                    <div class="filter-group">
                        <button type="submit" class="btn-filter">
                            <span class="material-icons-outlined">filter_list</span>
                            Terapkan Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{-- ===== COMPANIES SECTION ===== --}}
    <section class="companies-section">
        @if($perusahaan->count() > 0)
            <div class="companies-grid">
                @foreach($perusahaan as $p)
                    <div class="company-card" data-perusahaan-id="{{ $p->id }}" data-id="{{ $p->id }}">
                        {{-- Company Header --}}
                        <div class="company-header">
                            <div class="company-logo">
                                {{ strtoupper(substr($p->nama, 0, 2)) }}
                            </div>
                            <div class="company-info">
                                <h3 class="company-name perusahaan-nama">{{ $p->nama }}</h3>
                                <div class="company-location perusahaan-lokasi">
                                    <span class="material-icons-outlined">location_on</span>
                                    {{ $p->lokasi ?? 'Lokasi tidak tersedia' }}
                                </div>
                            </div>
                        </div>

                        {{-- Badges --}}
                        <div class="company-badges">
                            @if($p->jenis_kegiatan)
                                @if($p->jenis_kegiatan == 'Magang')
                                    <span class="badge badge-magang perusahaan-jenis">
                                        <span class="material-icons-outlined" style="font-size: 14px;">work</span>
                                        Magang
                                    </span>
                                @elseif($p->jenis_kegiatan == 'Kerja Praktik')
                                    <span class="badge badge-kp perusahaan-jenis">
                                        <span class="material-icons-outlined" style="font-size: 14px;">business_center</span>
                                        Kerja Praktik
                                    </span>
                                @elseif($p->jenis_kegiatan == 'Tugas Akhir')
                                    <span class="badge badge-ta perusahaan-jenis">
                                        <span class="material-icons-outlined" style="font-size: 14px;">school</span>
                                        Tugas Akhir
                                    </span>
                                @endif
                            @endif
                            
                            <span class="badge badge-open">
                                <span class="material-icons-outlined" style="font-size: 14px;">check_circle</span>
                                Terbuka
                            </span>
                        </div>

                        {{-- Description --}}
                        <p class="company-description perusahaan-tentang">
                            {{ Str::limit($p->tentang ?? 'Tidak ada deskripsi.', 120) }}
                        </p>

                        {{-- Stats --}}
                        <div class="company-stats">
                            <span class="material-icons-outlined">groups</span>
                            <strong class="perusahaan-jumlah">{{ $p->magang_count ?? $p->jumlah_mahasiswa }}</strong> Alumni
                        </div>

                        {{-- Footer Button --}}
                        <div class="company-footer">
                            <a href="{{ route('perusahaan.detail', $p->id) }}" class="btn-detail">
                                Lihat Detail
                                <span class="material-icons-outlined" style="font-size: 18px;">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ===== PAGINATION ===== --}}
            @if($perusahaan->hasPages())
                <div class="pagination-container">
                    {{-- Previous Button --}}
                    @if($perusahaan->onFirstPage())
                        <span class="pagination-btn disabled">
                            <span class="material-icons-outlined" style="font-size: 18px;">chevron_left</span>
                        </span>
                    @else
                        <a href="{{ $perusahaan->previousPageUrl() }}" class="pagination-btn">
                            <span class="material-icons-outlined" style="font-size: 18px;">chevron_left</span>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach($perusahaan->getUrlRange(1, $perusahaan->lastPage()) as $page => $url)
                        @if($page == $perusahaan->currentPage())
                            <span class="pagination-btn active">{{ $page }}</span>
                        @elseif($page == 1 || $page == $perusahaan->lastPage() || abs($page - $perusahaan->currentPage()) <= 2)
                            <a href="{{ $url }}" class="pagination-btn">{{ $page }}</a>
                        @elseif($page == 2 || $page == $perusahaan->lastPage() - 1)
                            <span class="pagination-dots">...</span>
                        @endif
                    @endforeach

                    {{-- Next Button --}}
                    @if($perusahaan->hasMorePages())
                        <a href="{{ $perusahaan->nextPageUrl() }}" class="pagination-btn">
                            <span class="material-icons-outlined" style="font-size: 18px;">chevron_right</span>
                        </a>
                    @else
                        <span class="pagination-btn disabled">
                            <span class="material-icons-outlined" style="font-size: 18px;">chevron_right</span>
                        </span>
                    @endif
                </div>
            @endif

        @else
            {{-- ===== EMPTY STATE ===== --}}
            <div class="empty-state">
                <span class="material-icons-outlined">business</span>
                <h3>Tidak Ada Perusahaan Ditemukan</h3>
                <p>Coba ubah filter pencarian atau kata kunci Anda.</p>
            </div>
        @endif
    </section>

    @include('components.footer')

    <script>
        // Navbar scroll effect
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // ===== REAL-TIME via Laravel Echo + Reverb =====
        function getBadgeHtml(jenis) {
            if (!jenis) return '';
            const map = {
                'Magang'       : '<span class="badge badge-magang"><span class="material-icons-outlined" style="font-size:14px">work</span> Magang</span>',
                'Kerja Praktik': '<span class="badge badge-kp"><span class="material-icons-outlined" style="font-size:14px">business_center</span> Kerja Praktik</span>',
                'Tugas Akhir'  : '<span class="badge badge-ta"><span class="material-icons-outlined" style="font-size:14px">school</span> Tugas Akhir</span>',
            };
            return (map[jenis] || '') + '<span class="badge badge-open"><span class="material-icons-outlined" style="font-size:14px">check_circle</span> Terbuka</span>';
        }

        function buildCard(data) {
            const initials = data.nama.substring(0, 2).toUpperCase();
            const desc = data.tentang ? data.tentang.substring(0, 120) + (data.tentang.length > 120 ? '...' : '') : 'Tidak ada deskripsi.';
            const url = `/perusahaan/${data.id}`;
            return `
            <div class="company-card" data-id="${data.id}" style="animation: fadeIn 0.4s ease">
                <div class="company-header">
                    <div class="company-logo">${initials}</div>
                    <div class="company-info">
                        <h3 class="company-name">${data.nama}</h3>
                        <div class="company-location">
                            <span class="material-icons-outlined">location_on</span>
                            ${data.lokasi || 'Lokasi tidak tersedia'}
                        </div>
                    </div>
                </div>
                <div class="company-badges">${getBadgeHtml(data.jenis_kegiatan)}</div>
                <p class="company-description">${desc}</p>
                <div class="company-stats">
                    <span class="material-icons-outlined">groups</span>
                    <strong>${data.jumlah_mahasiswa || 0}</strong> Alumni
                </div>
                <div class="company-footer">
                    <a href="${url}" class="btn-detail">Lihat Detail <span class="material-icons-outlined" style="font-size:18px">arrow_forward</span></a>
                </div>
            </div>`;
        }

        if (window.Echo) {
            window.Echo.channel('perusahaan')
                .listen('.perusahaan.created', (data) => {
                    const grid = document.querySelector('.companies-grid');
                    if (grid) {
                        grid.insertAdjacentHTML('afterbegin', buildCard(data));
                        // Show toast
                        showToast('✅ Perusahaan baru ditambahkan: ' + data.nama);
                    }
                })
                .listen('.perusahaan.updated', (data) => {
                    const card = document.querySelector(`.company-card[data-id="${data.id}"]`);
                    if (card) {
                        card.outerHTML = buildCard(data);
                        showToast('🔄 Data perusahaan diperbarui: ' + data.nama);
                    }
                })
                .listen('.perusahaan.deleted', (data) => {
                    const card = document.querySelector(`.company-card[data-id="${data.id}"]`);
                    if (card) {
                        card.style.animation = 'fadeOut 0.3s ease forwards';
                        setTimeout(() => card.remove(), 300);
                        showToast('🗑️ Perusahaan dihapus dari daftar.');
                    }
                });
        }
    </script>
    
    <script src="{{ asset('js/animations.js') }}"></script>
    <script>
        // Show toast notification on page load using animations.js toast
        document.addEventListener('DOMContentLoaded', () => {
            @if(session('success'))
                if (window.toast) {
                    window.toast.show('{{ session("success") }}', 'success', 4000);
                }
            @endif
            
            @if(session('error'))
                if (window.toast) {
                    window.toast.show('{{ session("error") }}', 'error', 4000);
                }
            @endif
        });
    </script>

    <style>
        @keyframes fadeIn  { from { opacity:0; transform:translateY(10px); } to { opacity:1; transform:translateY(0); } }
        @keyframes fadeOut { from { opacity:1; } to { opacity:0; } }
    </style>
</body>
</html>
