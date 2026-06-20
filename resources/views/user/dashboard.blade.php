<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard Mahasiswa SIMAKATA - Monitoring Kemajuan Akademik">
    <title>Dashboard — SIMAKATA</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <style>
                /* ===== RESET ===== */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --sidebar-w: 220px;
            --sidebar-bg: #0d1b2e;
            --sidebar-hover: rgba(255,255,255,0.06);
            --sidebar-active-bg: #1a5fb4;
            --blue-primary: #1a5fb4;
            --blue-dark: #0a3d6b;
            --blue-light: #e8f2ff;
            --amber: #f4a807;
            --text-1: #111827;
            --text-2: #6b7280;
            --text-3: #9ca3af;
            --border: #e5e7eb;
            --bg-page: #f3f6fb;
            --card-bg: #ffffff;
            --radius: 14px;
            --shadow-sm: 0 1px 4px rgba(0,0,0,0.07);
            --shadow-md: 0 4px 18px rgba(0,0,0,0.09);
        }
        html, body {
            height: 100%;
            font-family: 'Inter', -apple-system, sans-serif;
            background: var(--bg-page);
            color: var(--text-1);
            font-size: 14px;
            line-height: 1.5;
        }
        /* ===== SHELL ===== */
        .shell { display: flex; min-height: 100vh; }
        /* ===== SIDEBAR ===== */
        .sidebar {
            width: var(--sidebar-w);
            min-width: var(--sidebar-w);
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            height: 100vh;
            z-index: 100;
            overflow-y: auto;
            scrollbar-width: none;
        }
        .sidebar::-webkit-scrollbar { display: none; }
        .sidebar-brand {
            padding: 24px 22px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .brand-name {
            font-size: 17px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #fff;
        }
        .brand-sub {
            font-size: 10px;
            color: rgba(255,255,255,0.38);
            margin-top: 3px;
        }
        .sidebar-nav {
            flex: 1;
            padding: 14px 12px;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .nav-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 12px;
            border-radius: 10px;
            color: rgba(255,255,255,0.58);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: background 0.18s, color 0.18s;
        }
        .nav-item .material-icons-outlined { font-size: 20px; flex-shrink: 0; }
        .nav-item:hover { background: var(--sidebar-hover); color: rgba(255,255,255,0.9); }
        .nav-item.active { background: var(--sidebar-active-bg); color: #fff; font-weight: 600; }
        .sidebar-footer {
            padding: 14px 12px 18px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        .btn-logout {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            padding: 10px 12px;
            border-radius: 10px;
            background: none;
            border: none;
            color: rgba(255,255,255,0.45);
            font-size: 13px;
            font-weight: 500;
            font-family: inherit;
            cursor: pointer;
            transition: background 0.18s, color 0.18s;
            text-align: left;
        }
        .btn-logout .material-icons-outlined { font-size: 20px; }
        .btn-logout:hover { background: rgba(239,68,68,0.12); color: #f87171; }
        /* ===== MAIN ===== */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        /* ===== TOPBAR ===== */
        .topbar {
            background: #fff;
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            gap: 16px;
        }
        .topbar-heading { }
        .topbar-heading h1 { font-size: 18px; font-weight: 700; color: var(--text-1); }
        .topbar-heading p { font-size: 12px; color: var(--text-2); margin-top: 1px; }
        .topbar-right { display: flex; align-items: center; gap: 14px; }
        .topbar-icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-2);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            padding: 5px;
            transition: background 0.15s, color 0.15s;
            position: relative;
        }
        .topbar-icon-btn:hover { background: var(--blue-light); color: var(--blue-primary); }
        .topbar-icon-btn .material-icons-outlined { font-size: 22px; }
        .notif-dot {
            position: absolute;
            top: 4px; right: 4px;
            width: 8px; height: 8px;
            border-radius: 50%;
            background: #ef4444;
            border: 2px solid #fff;
        }
        .topbar-divider { width: 1px; height: 28px; background: var(--border); }
        .topbar-user { display: flex; align-items: center; gap: 10px; }
        .topbar-user-name { font-size: 13px; font-weight: 600; color: var(--text-1); text-align: right; }
        .topbar-user-role { font-size: 11px; color: var(--text-2); text-align: right; }
        .topbar-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4a6fa5, #1a5fb4);
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 14px; font-weight: 700;
            flex-shrink: 0;
        }
        /* ===== PAGE BODY ===== */
        .page-body { flex: 1; padding: 28px 32px 32px; display: flex; flex-direction: column; gap: 20px; }
        /* ===== WELCOME BANNER ===== */
        .welcome-banner {
            background: linear-gradient(120deg, #1a5fb4 0%, #0a3d6b 100%);
            border-radius: var(--radius);
            padding: 28px 32px;
            color: #fff;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }
        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -50px; right: -50px;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }
        .welcome-banner::after {
            content: '';
            position: absolute;
            bottom: -70px; left: 40%;
            width: 250px; height: 250px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }
        .banner-inner { position: relative; z-index: 1; }
        .banner-inner h2 { font-size: 22px; font-weight: 700; margin-bottom: 8px; }
        .banner-inner p { font-size: 13px; color: rgba(255,255,255,0.8); line-height: 1.7; margin-bottom: 20px; max-width: 520px; }
        .banner-btns { display: flex; gap: 10px; flex-wrap: wrap; }
        .btn-banner-white {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 20px;
            background: #fff;
            color: var(--blue-primary);
            font-size: 12px;
            font-weight: 700;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.18s;
        }
        .btn-banner-white:hover { background: #f0f5ff; }
        .btn-banner-white .material-icons-outlined { font-size: 16px; }
        /* ===== CONTENT GRID ===== */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 20px;
            align-items: start;
        }
        /* ===== CARD ===== */
        .card {
            background: var(--card-bg);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-bottom: 1px solid #f1f3f5;
            background: #fafbfc;
        }
        .card-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 700;
            color: var(--text-1);
        }
        .card-title .material-icons-outlined { font-size: 20px; color: var(--blue-primary); }
        .card-link {
            font-size: 12px;
            font-weight: 600;
            color: var(--blue-primary);
            text-decoration: none;
        }
        .card-link:hover { opacity: 0.75; }
        /* ===== STATUS CARD ===== */
        .status-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            padding: 32px 24px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .status-icon-wrap {
            width: 56px; height: 56px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .status-icon-wrap .material-icons-outlined { font-size: 28px; }
        .si-amber { background: #fef3c7; color: #d97706; }
        .si-green { background: #d1fae5; color: #059669; }
        .si-red { background: #fee2e2; color: #dc2626; }
        .si-slate { background: #f1f5f9; color: #64748b; }
        .status-info h3 { font-size: 17px; font-weight: 700; color: var(--text-1); margin-bottom: 4px; }
        .status-info .status-sub { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.7px; color: var(--text-3); }
        .status-title-text {
            font-size: 13px;
            color: var(--text-2);
            margin-top: 6px;
            font-style: italic;
        }
        /* ===== ACTIVITY FEED ===== */
        .activity-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 16px 20px;
            border-bottom: 1px solid #f1f3f5;
            transition: background 0.15s;
        }
        .activity-item:last-child { border-bottom: none; }
        .activity-item:hover { background: #fafbfc; }
        .activity-dot {
            width: 38px; height: 38px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .activity-dot .material-icons-outlined { font-size: 20px; }
        .ad-blue { background: #e8f2ff; color: #1a5fb4; }
        .ad-amber { background: #fef3c7; color: #d97706; }
        .ad-slate { background: #f1f5f9; color: #64748b; }
        .activity-content h4 { font-size: 13px; font-weight: 700; color: var(--text-1); margin-bottom: 3px; }
        .activity-content p { font-size: 12px; color: var(--text-2); line-height: 1.6; }
        .activity-time { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.6px; color: var(--text-3); margin-top: 5px; display: block; }
        /* ===== RIGHT PANEL ===== */
        .right-col { display: flex; flex-direction: column; gap: 16px; }
        /* Quick actions */
        .quick-action {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 20px;
            border-bottom: 1px solid #f1f3f5;
            text-decoration: none;
            color: var(--text-1);
            transition: background 0.15s;
        }
        .quick-action:last-child { border-bottom: none; }
        .quick-action:hover { background: var(--blue-light); }
        .qa-icon {
            width: 38px; height: 38px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .qa-icon .material-icons-outlined { font-size: 20px; }
        .qa-blue { background: var(--blue-light); color: var(--blue-primary); }
        .qa-indigo { background: #ede9fe; color: #6d28d9; }
        .qa-green { background: #d1fae5; color: #059669; }
        .qa-amber { background: #fef3c7; color: #d97706; }
        .qa-label { font-size: 13px; font-weight: 600; color: var(--text-1); }
        .qa-sub { font-size: 11px; color: var(--text-2); margin-top: 1px; }
        .qa-arrow { margin-left: auto; color: var(--text-3); }
        .qa-arrow .material-icons-outlined { font-size: 18px; }
        /* Profile mini card */
        .profile-mini {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 18px 20px;
        }
        .profile-mini-avatar {
            width: 46px; height: 46px;
            border-radius: 12px;
            background: linear-gradient(135deg, #4a6fa5, #1a5fb4);
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 18px; font-weight: 700;
            flex-shrink: 0;
        }
        .profile-mini-name { font-size: 14px; font-weight: 700; color: var(--text-1); }
        .profile-mini-nim { font-size: 11px; color: var(--text-2); margin-top: 2px; }
        .profile-mini-link {
            margin-top: 0;
            margin-left: auto;
            font-size: 12px;
            font-weight: 600;
            color: var(--blue-primary);
            text-decoration: none;
        }
        .profile-mini-link:hover { text-decoration: underline; }
        /* ===== FOOTER ===== */
        .page-footer {
            background: var(--card-bg);
            border-top: 1px solid var(--border);
            padding: 24px 32px;
            margin-top: 8px;
        }
        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }
        .footer-brand { font-size: 14px; font-weight: 800; color: var(--blue-primary); letter-spacing: 1.5px; }
        .footer-copy { font-size: 11px; color: var(--text-3); }
        /* ===== RESPONSIVE ===== */
        @media (max-width: 1100px) {
            .content-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {
            :root { --sidebar-w: 0px; }
            .sidebar { display: none; }
            .main { margin-left: 0; }
            .topbar { padding: 0 16px; }
            .topbar-heading h1 { font-size: 15px; }
            .page-body { padding: 16px; }
            .welcome-banner { padding: 20px 20px; }
        }
    </style>
</head>
<body>
<div class="shell">

    <!-- MOBILE HEADER -->
    {{-- ===== SIDEBAR ===== --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-name">SIMAKATA</div>
            <div class="brand-sub">Academic Management</div>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('landing') }}" id="nav-home" class="nav-item" title="Ke Landing Page">
                <span class="material-icons-outlined">home</span>
                <span>Home</span>
            </a>
            <a href="{{ route('user.dashboard') }}" id="nav-dashboard" class="nav-item active">
                <span class="material-icons-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('user.kp-magang.create') }}" id="nav-kp" class="nav-item">
                <span class="material-icons-outlined">work_outline</span>
                <span>Input KP/Magang</span>
            </a>

            <a href="{{ route('judul-ta.index') }}" id="nav-ta" class="nav-item">
                <span class="material-icons-outlined">description</span>
                <span>Input Tugas Akhir</span>
            </a>

            <a href="{{ route('riwayat.index') }}" id="nav-riwayat" class="nav-item">
                <span class="material-icons-outlined">history</span>
                <span>Riwayat Aktivitas</span>
            </a>
            <a href="{{ route('user.profil') }}" id="nav-profil" class="nav-item">
                <span class="material-icons-outlined">person</span>
                <span>Profil</span>
            </a>
        </nav>

        <!-- Sidebar Bottom: Logout -->
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" class="btn-logout" id="btn-logout">
                    <span class="material-icons-outlined">logout</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- ===== MAIN ===== --}}
    <div class="main">
        {{-- Topbar --}}
        <header class="topbar">
            <div class="topbar-heading">
                <h1>Dashboard</h1>
                <p>Monitoring kemajuan akademik Anda secara real-time.</p>
            </div>
            
            <div class="topbar-right">
                {{-- Notification bell removed --}}
                
                <!-- Profile Pic -->
                <div class="topbar-divider"></div>
                <div class="topbar-user">
                    <div>
                        <div class="topbar-user-name">{{ $user->nama_lengkap ?? 'Mahasiswa' }}</div>
                        <div class="topbar-user-role">Mahasiswa</div>
                    </div>
                    <div class="topbar-avatar">
                        @if(Auth::user()->avatar)
                            <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                        @else
                            {{ strtoupper(substr($user->nama_lengkap ?? 'M', 0, 1)) }}
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- MAIN VIEW PORTION -->
        {{-- Page Content --}}
        <main class="page-body">

           {{-- ===== WELCOME BANNER ===== --}}
            <div class="welcome-banner" id="welcome-banner">
                <div class="banner-inner">
                    <h2>Selamat Datang, {{ $user->nama_lengkap ?? 'Mahasiswa Informatika' }} 👋</h2>
                    <p>Kelola Kerja Praktik, Magang, dan Tugas Akhir Anda dalam satu platform yang terintegrasi dan efisien.</p>
                    <div class="banner-btns">
                        {{-- Panduan buttons removed --}}
                    </div>
                </div>
            </div>

            {{-- ===== CONTENT GRID ===== --}}
            <div class="content-grid">

                {{-- LEFT COLUMN --}}
                <div style="display: flex; flex-direction: column; gap: 16px;">

                {{-- Status Verifikasi --}}
                    <div class="status-card" id="card-status-ta">
                        @if($status_verifikasi === 'pending')
                            <div class="status-icon-wrap si-amber">
                                <span class="material-icons-outlined">pending_actions</span>
                            </div>
                            <div class="status-info">
                                <h3>Menunggu Verifikasi</h3>
                                <div class="status-sub">Status Judul Tugas Akhir</div>
                                @if($final_project)
                                    <div class="status-title-text">"{{ $final_project->title }}"</div>
                                @endif
                            </div>
                        @elseif($status_verifikasi === 'approved')
                            <div class="status-icon-wrap si-green">
                                <span class="material-icons-outlined">check_circle_outline</span>
                            </div>
                            <div class="status-info">
                                <h3>Judul TA Disetujui</h3>
                                <div class="status-sub">Status Judul Tugas Akhir</div>
                                @if($final_project)
                                    <div class="status-title-text">"{{ $final_project->title }}"</div>
                                @endif
                            </div>
                        @elseif($status_verifikasi === 'rejected')
                            <div class="status-icon-wrap si-red">
                                <span class="material-icons-outlined">cancel</span>
                            </div>
                            <div class="status-info">
                                <h3>Judul TA Ditolak</h3>
                                <div class="status-sub">Status Judul Tugas Akhir</div>
                                @if($final_project)
                                    <div class="status-title-text">"{{ $final_project->title }}"</div>
                                @endif
                            </div>
                        @else
                            <div class="status-icon-wrap si-slate">
                                <span class="material-icons-outlined">article</span>
                            </div>
                            <div class="status-info">
                                <h3>Belum Mengajukan Judul</h3>
                                <div class="status-sub">Status Judul Tugas Akhir</div>
                                <div class="status-title-text">Klik "Input Tugas Akhir" untuk mulai mengajukan.</div>
                            </div>
                        @endif
                    </div>

                    {{-- Riwayat Aktivitas --}}
                    <div class="card" id="card-aktivitas">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="material-icons-outlined">timeline</span>
                                Riwayat Aktivitas
                            </div>
                            <a href="{{ route('riwayat.index') }}" class="card-link" id="link-lihat-semua">Lihat Semua</a>
                        </div>
                        <div>
                            @foreach($riwayat_aktivitas as $i => $aktivitas)
                                <div class="activity-item" id="activity-item-{{ $i }}">
                                    @php
                                        $judul_lower = strtolower($aktivitas['judul']);
                                    @endphp
                                    @if(str_contains($judul_lower, 'setuju') || str_contains($judul_lower, 'disetujui'))
                                        <div class="activity-dot ad-blue">
                                            <span class="material-icons-outlined">check_circle_outline</span>
                                        </div>
                                    @elseif(str_contains($judul_lower, 'verifikasi') || str_contains($judul_lower, 'ditolak'))
                                        <div class="activity-dot ad-amber">
                                            <span class="material-icons-outlined">pending_actions</span>
                                        </div>
                                    @else
                                        <div class="activity-dot ad-slate">
                                            <span class="material-icons-outlined">upload_file</span>
                                        </div>
                                    @endif
                                    <div class="activity-content">
                                        <h4>{{ $aktivitas['judul'] }}</h4>
                                        <p>{{ $aktivitas['deskripsi'] }}</p>
                                        <span class="activity-time">{{ $aktivitas['waktu'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>{{-- /left --}}

                {{-- RIGHT COLUMN --}}
                <div class="right-col">
                    {{-- Profile Mini --}}
                    <div class="card" id="card-profile-mini">
                        <div class="profile-mini">
                            <div class="profile-mini-avatar">
                                {{ strtoupper(substr($user->nama_lengkap ?? 'M', 0, 1)) }}
                            </div>
                            <div>
                                <div class="profile-mini-name">{{ $user->nama_lengkap ?? '-' }}</div>
                                <div class="profile-mini-nim">NIM: {{ $user->nim ?? '-' }}</div>
                            </div>
                            <a href="{{ route('user.profil') }}" class="profile-mini-link" id="link-profil-mini">Lihat Profil</a>
                        </div>
                    </div>
                    {{-- Aksi Cepat --}}
                    <div class="card" id="card-aksi-cepat">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="material-icons-outlined">bolt</span>
                                Aksi Cepat
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('judul-ta.index') }}" class="quick-action" id="qa-input-ta">
                                <div class="qa-icon qa-indigo">
                                    <span class="material-icons-outlined">description</span>
                                </div>
                                <div>
                                    <div class="qa-label">Input Tugas Akhir</div>
                                    <div class="qa-sub">Ajukan judul TA baru</div>
                                </div>
                                <div class="qa-arrow"><span class="material-icons-outlined">chevron_right</span></div>
                            </a>
                            <a href="{{ route('user.kp-magang.create') }}" class="quick-action" id="qa-input-kp">
                                <div class="qa-icon qa-blue">
                                    <span class="material-icons-outlined">work_outline</span>
                                </div>
                                <div>
                                    <div class="qa-label">Input KP/Magang</div>
                                    <div class="qa-sub">Daftarkan pengajuan magang</div>
                                </div>
                                <div class="qa-arrow"><span class="material-icons-outlined">chevron_right</span></div>
                            </a>
                            <a href="{{ route('riwayat.index') }}" class="quick-action" id="qa-riwayat">
                                <div class="qa-icon qa-amber">
                                    <span class="material-icons-outlined">history</span>
                                </div>
                                <div>
                                    <div class="qa-label">Riwayat Aktivitas</div>
                                    <div class="qa-sub">Lihat semua aktivitas Anda</div>
                                </div>
                                <div class="qa-arrow"><span class="material-icons-outlined">chevron_right</span></div>
                            </a>
                        </div>
                    </div>
                </div>{{-- /right-col --}}
            </div>{{-- /content-grid --}}
        </main>

            {{-- Footer --}}
        <footer class="user-page-footer" style="background: #f8fafc; border-top: 1px solid var(--border); padding: 32px 32px 20px; margin-top: 12px;">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 24px; flex-wrap: wrap;">
                <div>
                    <div style="font-size: 16px; font-weight: 800; color: var(--blue-primary); letter-spacing: 1px; margin-bottom: 6px;">SIMAKATA</div>
                    <p style="font-size: 12px; color: var(--text-2); line-height: 1.6; margin: 0;">Managed by 4 Sekawan</p>
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <a href="https://wa.me/6281234567890" target="_blank" style="width: 36px; height: 36px; border-radius: 50%; background: #ffffff; border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; color: var(--text-2); transition: all 0.2s; text-decoration: none;" title="Hubungi Admin via WhatsApp">
                        <span class="material-icons-outlined" style="font-size: 18px;">chat</span>
                    </a>
                </div>
            </div>
            <div style="padding-top: 16px; border-top: 1px solid var(--border); font-size: 11px; color: var(--text-3); text-align: center; margin-top: 20px;">
                &copy; 2026 4 Sekawan
            </div>
        </footer>
    </div>{{-- /main --}}
</div>{{-- /shell --}}
</body>
</html>
