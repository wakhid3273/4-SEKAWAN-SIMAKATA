<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $perusahaan->nama }} - SIMAKATA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
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
        }
        .navbar-links a.active,
        .navbar-links a:hover {
            color: var(--blue-main);
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

        .btn-back {
            background: var(--white);
            color: var(--blue-main);
            border: 2px solid var(--blue-main);
        }
        .btn-back:hover {
            background: var(--blue-pale);
        }

        /* ===== CONTAINER ===== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 48px 40px;
        }

        /* ===== HEADER SECTION ===== */
        .detail-header {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 32px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 24px;
            border: 1px solid var(--border);
        }

        .header-top {
            display: flex;
            align-items: flex-start;
            gap: 24px;
            margin-bottom: 24px;
        }

        .company-logo-large {
            width: 96px;
            height: 96px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--blue-pale);
            color: var(--blue-main);
            font-size: 36px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .header-info {
            flex: 1;
        }

        .header-info h1 {
            font-size: 32px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 12px;
        }

        .header-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            align-items: center;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-gray);
            font-size: 15px;
        }

        .meta-item .material-icons-outlined {
            font-size: 20px;
            color: var(--blue-main);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
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

        /* ===== TABS ===== */
        .tabs {
            display: flex;
            gap: 8px;
            border-bottom: 2px solid var(--border);
            margin-bottom: 24px;
        }

        .tab-btn {
            padding: 12px 24px;
            background: transparent;
            border: none;
            font-size: 15px;
            font-weight: 600;
            color: var(--text-gray);
            cursor: pointer;
            position: relative;
            transition: all 0.2s;
        }

        .tab-btn.active {
            color: var(--blue-main);
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--blue-main);
            border-radius: 99px;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* ===== CONTENT CARDS ===== */
        .content-card {
            background: var(--white);
            border-radius: var(--radius-md);
            padding: 32px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
        }

        .content-card h2 {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .content-card h2 .material-icons-outlined {
            color: var(--blue-main);
        }

        .content-card p {
            color: var(--text-mid);
            line-height: 1.8;
            margin-bottom: 16px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .info-item {
            display: flex;
            gap: 12px;
        }

        .info-item .material-icons-outlined {
            color: var(--blue-main);
            font-size: 24px;
        }

        .info-item-content {
            flex: 1;
        }

        .info-item-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-gray);
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .info-item-value {
            font-size: 15px;
            color: var(--text-dark);
            font-weight: 500;
        }

        .info-item-value a {
            color: var(--blue-main);
            text-decoration: underline;
        }

        /* ===== ALUMNI LIST ===== */
        .alumni-list {
            display: grid;
            gap: 16px;
        }

        .alumni-item {
            background: var(--bg-page);
            padding: 20px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            transition: all 0.2s;
        }

        .alumni-item:hover {
            box-shadow: var(--shadow-sm);
            border-color: var(--blue-light);
        }

        .alumni-name {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .alumni-info {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            font-size: 14px;
            color: var(--text-gray);
        }

        .alumni-info span {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .alumni-info .material-icons-outlined {
            font-size: 16px;
        }

        .empty-state {
            text-align: center;
            padding: 48px 20px;
        }

        .empty-state .material-icons-outlined {
            font-size: 64px;
            color: var(--text-light);
            margin-bottom: 16px;
        }

        .empty-state p {
            color: var(--text-gray);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .navbar {
                padding: 0 20px;
            }

            .navbar-links {
                display: none;
            }

            .container {
                padding: 32px 20px;
            }

            .detail-header {
                padding: 24px;
            }

            .header-top {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .header-info h1 {
                font-size: 24px;
            }

            .header-meta {
                justify-content: center;
            }

            .tabs {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .content-card {
                padding: 24px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    {{-- ===== NAVBAR ===== --}}
    <nav class="navbar">
        <a href="{{ route('landing') }}" class="navbar-logo">SIMAKATA</a>
        <ul class="navbar-links">
            <li><a href="{{ route('landing') }}">Beranda</a></li>
            <li><a href="{{ route('perusahaan.index') }}" class="active">Perusahaan</a></li>
            <li><a href="#judul-ta">Judul TA</a></li>
            <li><a href="#riwayat">Riwayat</a></li>
        </ul>
        <div class="navbar-auth">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('login.form') }}" class="btn btn-back">Login</a>
                <a href="{{ route('register.form') }}" class="btn btn-primary">Daftar</a>
            @endauth
        </div>
    </nav>

    {{-- ===== MAIN CONTENT ===== --}}
    <div class="container">
        {{-- Back Button --}}
        <div style="margin-bottom: 24px;">
            <a href="{{ route('perusahaan.index') }}" class="btn btn-back">
                <span class="material-icons-outlined" style="font-size: 18px;">arrow_back</span>
                Kembali ke Database
            </a>
        </div>

        {{-- Header Section --}}
        <div class="detail-header">
            <div class="header-top">
                <div class="company-logo-large">
                    {{ strtoupper(substr($perusahaan->nama, 0, 2)) }}
                </div>
                <div class="header-info">
                    <h1>{{ $perusahaan->nama }}</h1>
                    <div class="header-meta">
                        <div class="meta-item">
                            <span class="material-icons-outlined">location_on</span>
                            {{ $perusahaan->lokasi ?? 'Lokasi tidak tersedia' }}
                        </div>
                        <div class="meta-item">
                            <span class="material-icons-outlined">groups</span>
                            <strong>{{ $perusahaan->jumlah_alumni }}</strong> Alumni
                        </div>
                        @if($perusahaan->jenis_kegiatan)
                            @if($perusahaan->jenis_kegiatan == 'Magang')
                                <span class="badge badge-magang">
                                    <span class="material-icons-outlined" style="font-size: 16px;">work</span>
                                    Magang
                                </span>
                            @elseif($perusahaan->jenis_kegiatan == 'Kerja Praktik')
                                <span class="badge badge-kp">
                                    <span class="material-icons-outlined" style="font-size: 16px;">business_center</span>
                                    Kerja Praktik
                                </span>
                            @elseif($perusahaan->jenis_kegiatan == 'Tugas Akhir')
                                <span class="badge badge-ta">
                                    <span class="material-icons-outlined" style="font-size: 16px;">school</span>
                                    Tugas Akhir
                                </span>
                            @endif
                        @endif
                        <span class="badge badge-open">
                            <span class="material-icons-outlined" style="font-size: 16px;">check_circle</span>
                            Terbuka
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabs --}}
        <div class="tabs">
            <button class="tab-btn active" onclick="switchTab('info')">
                <span class="material-icons-outlined" style="font-size: 18px; vertical-align: middle;">info</span>
                Informasi Perusahaan
            </button>
            <button class="tab-btn" onclick="switchTab('alumni')">
                <span class="material-icons-outlined" style="font-size: 18px; vertical-align: middle;">history_edu</span>
                Riwayat Magang
            </button>
        </div>

        {{-- Tab Content: Info --}}
        <div id="tab-info" class="tab-content active">
            <div class="content-card">
                <h2>
                    <span class="material-icons-outlined">business</span>
                    Tentang Perusahaan
                </h2>
                <p>{{ $perusahaan->tentang ?? 'Tidak ada deskripsi tersedia.' }}</p>

                <h2 style="margin-top: 32px;">
                    <span class="material-icons-outlined">contact_mail</span>
                    Kontak & Lokasi
                </h2>
                <div class="info-grid">
                    @if($perusahaan->website)
                        <div class="info-item">
                            <span class="material-icons-outlined">language</span>
                            <div class="info-item-content">
                                <div class="info-item-label">Website</div>
                                <div class="info-item-value">
                                    <a href="{{ $perusahaan->website }}" target="_blank" rel="noopener">
                                        {{ $perusahaan->website }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($perusahaan->email)
                        <div class="info-item">
                            <span class="material-icons-outlined">email</span>
                            <div class="info-item-content">
                                <div class="info-item-label">Email</div>
                                <div class="info-item-value">
                                    <a href="mailto:{{ $perusahaan->email }}">{{ $perusahaan->email }}</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($perusahaan->alamat)
                        <div class="info-item">
                            <span class="material-icons-outlined">place</span>
                            <div class="info-item-content">
                                <div class="info-item-label">Alamat</div>
                                <div class="info-item-value">{{ $perusahaan->alamat }}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Tab Content: Alumni --}}
        <div id="tab-alumni" class="tab-content">
            <div class="content-card">
                <h2>
                    <span class="material-icons-outlined">history_edu</span>
                    Riwayat Mahasiswa Magang
                </h2>

                @if($riwayatMagang->count() > 0)
                    <div class="alumni-list">
                        @foreach($riwayatMagang as $mhs)
                            <div class="alumni-item">
                                <div class="alumni-name">{{ $mhs->nama }}</div>
                                <div class="alumni-info">
                                    <span>
                                        <span class="material-icons-outlined">school</span>
                                        Angkatan {{ $mhs->angkatan ?? '-' }}
                                    </span>
                                    <span>
                                        <span class="material-icons-outlined">work</span>
                                        {{ $mhs->posisi ?? 'Posisi tidak tersedia' }}
                                    </span>
                                    <span>
                                        <span class="material-icons-outlined">calendar_today</span>
                                        {{ $mhs->periode ?? 'Periode tidak tersedia' }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <span class="material-icons-outlined">group_off</span>
                        <p>Belum ada riwayat mahasiswa magang di perusahaan ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

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

        // Tab switching
        function switchTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            // Show selected tab
            document.getElementById('tab-' + tabName).classList.add('active');
            event.currentTarget.classList.add('active');
        }
    </script>

</body>
</html>
