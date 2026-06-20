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

        .btn-secondary {
            background: var(--white);
            color: var(--blue-main);
            border: 2px solid var(--blue-main);
        }
        .btn-secondary:hover {
            background: var(--blue-pale);
        }

        /* ===== HERO BANNER ===== */
        .hero-banner {
            height: 280px;
            background: linear-gradient(135deg, #0a3d6b 0%, #1a5fb4 50%, #2563eb 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%);
            animation: pulse 8s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,0.03) 10px, rgba(255,255,255,0.03) 20px);
            opacity: 0.5;
        }

        /* ===== CONTAINER ===== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
        }

        /* ===== COMPANY HEADER ===== */
        .company-header {
            position: relative;
            margin-top: -100px;
            margin-bottom: 32px;
        }

        .company-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 32px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
        }

        .company-top {
            display: flex;
            gap: 24px;
            align-items: flex-start;
            margin-bottom: 24px;
        }

        .company-logo {
            width: 96px;
            height: 96px;
            border-radius: var(--radius-md);
            background: var(--blue-pale);
            color: var(--blue-main);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: 700;
            flex-shrink: 0;
            box-shadow: var(--shadow-sm);
        }

        .company-info {
            flex: 1;
        }

        .company-name {
            font-size: 32px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .company-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            margin-bottom: 16px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 15px;
            color: var(--text-gray);
        }

        .meta-item .material-icons-outlined {
            font-size: 20px;
            color: var(--blue-main);
        }

        .company-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
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

        .company-actions {
            display: flex;
            gap: 12px;
            margin-left: auto;
        }

        .btn-share {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-sm);
            background: var(--bg-page);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-gray);
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-share:hover {
            background: var(--white);
            border-color: var(--blue-main);
            color: var(--blue-main);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .btn-action {
            padding: 12px 28px;
        }

        /* ===== MAIN CONTENT LAYOUT ===== */
        .content-layout {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 32px;
            margin-bottom: 48px;
        }

        /* ===== TABS ===== */
        .tabs {
            display: flex;
            gap: 8px;
            border-bottom: 2px solid var(--border);
            margin-bottom: 32px;
        }

        .tab-btn {
            padding: 14px 24px;
            background: transparent;
            border: none;
            font-size: 15px;
            font-weight: 600;
            color: var(--text-gray);
            cursor: pointer;
            position: relative;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
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
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ===== CONTENT CARD ===== */
        .content-card {
            background: var(--white);
            border-radius: var(--radius-md);
            padding: 32px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title .material-icons-outlined {
            color: var(--blue-main);
            font-size: 24px;
        }

        .section-text {
            color: var(--text-mid);
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .info-grid {
            display: grid;
            gap: 20px;
        }

        .info-item {
            display: flex;
            gap: 12px;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            background: var(--blue-pale);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .info-icon .material-icons-outlined {
            color: var(--blue-main);
            font-size: 20px;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 15px;
            color: var(--text-dark);
            font-weight: 500;
            word-break: break-word;
        }

        .info-value a {
            color: var(--blue-main);
            text-decoration: underline;
        }

        .info-value a:hover {
            color: var(--blue-dark);
        }

        /* ===== RIWAYAT MAGANG TABLE ===== */
        .magang-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .magang-table thead {
            background: var(--bg-page);
        }

        .magang-table th {
            padding: 14px 16px;
            text-align: left;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-mid);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border);
        }

        .magang-table td {
            padding: 16px;
            font-size: 14px;
            color: var(--text-mid);
            border-bottom: 1px solid var(--border);
        }

        .magang-table tbody tr {
            transition: all 0.2s;
        }

        .magang-table tbody tr:hover {
            background: var(--blue-pale);
        }

        .magang-table tbody tr:last-child td {
            border-bottom: none;
        }

        .student-name {
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .student-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--blue-pale);
            color: var(--blue-main);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            flex-shrink: 0;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {}

        .sidebar-card {
            background: var(--white);
            border-radius: var(--radius-md);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            margin-bottom: 24px;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sidebar-title .material-icons-outlined {
            color: var(--blue-main);
        }

        .cta-card {
            background: linear-gradient(135deg, var(--blue-main) 0%, var(--blue-mid) 100%);
            color: var(--white);
            text-align: center;
        }

        .cta-card .sidebar-title {
            color: var(--white);
        }

        .cta-card .sidebar-title .material-icons-outlined {
            color: var(--white);
        }

        .cta-text {
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
            opacity: 0.95;
        }

        .btn-cta {
            width: 100%;
            background: var(--white);
            color: var(--blue-main);
            justify-content: center;
        }

        .btn-cta:hover {
            background: var(--blue-pale);
            transform: translateY(-2px);
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state .material-icons-outlined {
            font-size: 72px;
            color: var(--text-light);
            margin-bottom: 16px;
        }

        .empty-state h3 {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-mid);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 14px;
            color: var(--text-gray);
        }

        /* ===== BACK BUTTON ===== */
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: var(--white);
            border: 2px solid var(--border);
            border-radius: var(--radius-sm);
            color: var(--text-mid);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 24px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .back-button:hover {
            border-color: var(--blue-main);
            color: var(--blue-main);
            transform: translateX(-4px);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .content-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                order: -1;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0 20px;
            }

            .navbar-links {
                display: none;
            }

            .container {
                padding: 0 20px;
            }

            .hero-banner {
                height: 200px;
            }

            .company-header {
                margin-top: -60px;
            }

            .company-card {
                padding: 20px;
            }

            .company-top {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .company-logo {
                width: 80px;
                height: 80px;
                font-size: 28px;
            }

            .company-name {
                font-size: 24px;
            }

            .company-meta {
                justify-content: center;
            }

            .company-actions {
                margin-left: 0;
                width: 100%;
                flex-direction: column;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }

            .content-card {
                padding: 20px;
            }

            .magang-table {
                font-size: 13px;
            }

            .magang-table th,
            .magang-table td {
                padding: 12px 8px;
            }
        }
    </style>
</head>
<body>

    {{-- ===== NAVBAR ===== --}}
    @include('components.navbar')

    {{-- ===== HERO BANNER ===== --}}
    <div class="hero-banner">
        <div class="hero-pattern"></div>
    </div>

    {{-- ===== MAIN CONTENT ===== --}}
    <div class="container">
        {{-- Back Button --}}
        <a href="{{ route('perusahaan.index') }}" class="back-button">
            <span class="material-icons-outlined" style="font-size: 20px;">arrow_back</span>
            Kembali ke Database Perusahaan
        </a>

        {{-- Company Header Card --}}
        <div class="company-header">
            <div class="company-card">
                <div class="company-top">
                    <div class="company-logo">
                        {{ strtoupper(substr($perusahaan->nama, 0, 2)) }}
                    </div>
                    <div class="company-info">
                        <h1 class="company-name">{{ $perusahaan->nama }}</h1>
                        <div class="company-meta">
                            <div class="meta-item">
                                <span class="material-icons-outlined">category</span>
                                Software Development & Cloud Computing
                            </div>
                            <div class="meta-item">
                                <span class="material-icons-outlined">location_on</span>
                                {{ $perusahaan->lokasi ?? 'Lokasi tidak tersedia' }}
                            </div>
                            <div class="meta-item">
                                <span class="material-icons-outlined">groups</span>
                                <strong>{{ $riwayatMagang->count() > 0 ? $riwayatMagang->count() : $perusahaan->jumlah_mahasiswa }}</strong> Alumni
                            </div>
                        </div>
                        <div class="company-badges">
                            @if($perusahaan->jenis_kegiatan)
                                @if($perusahaan->jenis_kegiatan == 'Magang')
                                    <span class="badge badge-magang">
                                        <span class="material-icons-outlined" style="font-size: 16px;">work</span>
                                        Terbuka untuk Magang
                                    </span>
                                @elseif($perusahaan->jenis_kegiatan == 'Kerja Praktik')
                                    <span class="badge badge-kp">
                                        <span class="material-icons-outlined" style="font-size: 16px;">business_center</span>
                                        Terbuka untuk Kerja Praktik
                                    </span>
                                @elseif($perusahaan->jenis_kegiatan == 'Tugas Akhir')
                                    <span class="badge badge-ta">
                                        <span class="material-icons-outlined" style="font-size: 16px;">school</span>
                                        Terbuka untuk Tugas Akhir
                                    </span>
                                @endif
                            @endif
                            <span class="badge badge-open">
                                <span class="material-icons-outlined" style="font-size: 16px;">check_circle</span>
                                500+ Karyawan
                            </span>
                        </div>
                    </div>
                    <div class="company-actions">
                        <button class="btn-share" onclick="shareCompany()" title="Bagikan">
                            <span class="material-icons-outlined" style="font-size: 20px;">share</span>
                        </button>
                        <a href="{{ route('perusahaan.index') }}" class="btn btn-primary btn-action">
                            <span class="material-icons-outlined" style="font-size: 18px;">send</span>
                            Ajukan KP/Magang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content Layout --}}
        <div class="content-layout">
            {{-- Main Content --}}
            <div class="main-content">
                {{-- Tabs --}}
                <div class="tabs">
                    <button class="tab-btn active" onclick="switchTab('info')">
                        <span class="material-icons-outlined" style="font-size: 20px;">info</span>
                        Informasi Perusahaan
                    </button>
                    <button class="tab-btn" onclick="switchTab('riwayat')">
                        <span class="material-icons-outlined" style="font-size: 20px;">history_edu</span>
                        Riwayat Magang
                    </button>
                </div>

                {{-- Tab Content: Informasi Perusahaan --}}
                <div id="tab-info" class="tab-content active">
                    <div class="content-card">
                        <h2 class="section-title">
                            <span class="material-icons-outlined">business</span>
                            Tentang Perusahaan
                        </h2>
                        <p class="section-text">
                            {{ $perusahaan->tentang ?? 'Tidak ada deskripsi perusahaan yang tersedia.' }}
                        </p>

                        @if($perusahaan->website || $perusahaan->email || $perusahaan->alamat)
                            <h2 class="section-title" style="margin-top: 32px;">
                                <span class="material-icons-outlined">contact_mail</span>
                                Informasi Kontak
                            </h2>
                            <div class="info-grid">
                                @if($perusahaan->website)
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <span class="material-icons-outlined">language</span>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Website</div>
                                            <div class="info-value">
                                                <a href="{{ $perusahaan->website }}" target="_blank" rel="noopener noreferrer">
                                                    {{ $perusahaan->website }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($perusahaan->email)
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <span class="material-icons-outlined">email</span>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Email</div>
                                            <div class="info-value">
                                                <a href="mailto:{{ $perusahaan->email }}">{{ $perusahaan->email }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($perusahaan->alamat)
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <span class="material-icons-outlined">place</span>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Alamat Lengkap</div>
                                            <div class="info-value">{{ $perusahaan->alamat }}</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Tab Content: Riwayat Magang --}}
                <div id="tab-riwayat" class="tab-content">
                    <div class="content-card">
                        <h2 class="section-title">
                            <span class="material-icons-outlined">history_edu</span>
                            Riwayat Magang Mahasiswa
                        </h2>

                        @if($riwayatMagang->count() > 0)
                            <table class="magang-table">
                                <thead>
                                    <tr>
                                        <th>Nama Mahasiswa</th>
                                        <th>Angkatan</th>
                                        <th>Posisi</th>
                                        <th>Periode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($riwayatMagang as $mhs)
                                        <tr>
                                            <td>
                                                <div class="student-name">
                                                    <div class="student-avatar">
                                                        {{ strtoupper(substr($mhs->nama, 0, 1)) }}
                                                    </div>
                                                    {{ $mhs->nama }}
                                                </div>
                                            </td>
                                            <td>{{ $mhs->angkatan ?? '-' }}</td>
                                            <td>{{ $mhs->posisi ?? 'Tidak tersedia' }}</td>
                                            <td>{{ $mhs->periode ?? 'Tidak tersedia' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="empty-state">
                                <span class="material-icons-outlined">group_off</span>
                                <h3>Belum Ada Riwayat Magang</h3>
                                <p>Belum ada mahasiswa yang tercatat melakukan magang di perusahaan ini.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="sidebar">
                {{-- Kontak & Lokasi Card --}}
                <div class="sidebar-card">
                    <h3 class="sidebar-title">
                        <span class="material-icons-outlined">contact_mail</span>
                        Kontak & Lokasi
                    </h3>
                    <div class="info-grid">
                        @if($perusahaan->website)
                            <div class="info-item">
                                <div class="info-icon">
                                    <span class="material-icons-outlined">language</span>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Website</div>
                                    <div class="info-value">
                                        <a href="{{ $perusahaan->website }}" target="_blank" rel="noopener">
                                            {{ parse_url($perusahaan->website, PHP_URL_HOST) ?? $perusahaan->website }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($perusahaan->email)
                            <div class="info-item">
                                <div class="info-icon">
                                    <span class="material-icons-outlined">email</span>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Email</div>
                                    <div class="info-value">
                                        <a href="mailto:{{ $perusahaan->email }}">{{ $perusahaan->email }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($perusahaan->alamat)
                            <div class="info-item">
                                <div class="info-icon">
                                    <span class="material-icons-outlined">place</span>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Alamat</div>
                                    <div class="info-value">{{ $perusahaan->alamat }}</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- CTA Card --}}
                <div class="sidebar-card cta-card">
                    <h3 class="sidebar-title">
                        <span class="material-icons-outlined">rocket_launch</span>
                        Ingin Bergabung?
                    </h3>
                    <p class="cta-text">
                        Kami membuka kesempatan magang untuk posisi Frontend, Backend, dan Data Science selama summer.
                    </p>
                    <a href="{{ route('perusahaan.index') }}" class="btn btn-cta">
                        <span class="material-icons-outlined" style="font-size: 18px;">send</span>
                        Lihat Lowongan
                    </a>
                </div>
            </div>
        </div>
    </div>

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

        // Share function
        function shareCompany() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $perusahaan->nama }} - SIMAKATA',
                    text: 'Lihat profil {{ $perusahaan->nama }} di SIMAKATA',
                    url: window.location.href
                }).catch(err => console.log('Error sharing:', err));
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(window.location.href).then(() => {
                    alert('Link berhasil disalin ke clipboard!');
                });
            }
        }
    </script>

</body>
</html>
