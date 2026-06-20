<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Profil Mahasiswa - SIMAKATA">
    <title>Profil — SIMAKATA</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Animations CSS -->
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">

    <style>
        /* ===== RESET & BASE ===== */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --sidebar-w: 220px;
            --sidebar-bg: #0d1b2e;
            --sidebar-hover: rgba(255,255,255,0.06);
            --sidebar-active-bg: #1a5fb4;
            --sidebar-active-text: #ffffff;
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

        /* ===== LAYOUT SHELL ===== */
        .shell {
            display: flex;
            min-height: 100vh;
        }

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
        .sidebar-brand .brand-name {
            font-size: 17px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #fff;
        }
        .sidebar-brand .brand-sub {
            font-size: 10px;
            font-weight: 400;
            color: rgba(255,255,255,0.38);
            letter-spacing: 0.5px;
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
        .nav-item:hover {
            background: var(--sidebar-hover);
            color: rgba(255,255,255,0.9);
        }
        .nav-item.active {
            background: var(--sidebar-active-bg);
            color: var(--sidebar-active-text);
            font-weight: 600;
        }

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

        /* ===== MAIN CONTENT ===== */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ===== TOP NAVBAR ===== */
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
        .topbar-search {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f3f6fb;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 8px 14px;
            flex: 1;
            max-width: 420px;
        }
        .topbar-search .material-icons-outlined {
            font-size: 18px;
            color: var(--text-3);
        }
        .topbar-search input {
            background: none;
            border: none;
            outline: none;
            font-size: 13px;
            color: var(--text-1);
            font-family: inherit;
            width: 100%;
        }
        .topbar-search input::placeholder { color: var(--text-3); }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }
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
        .topbar-divider {
            width: 1px; height: 28px;
            background: var(--border);
        }
        .topbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }
        .topbar-user-info { text-align: right; }
        .topbar-user-info .u-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-1);
            line-height: 1.2;
        }
        .topbar-user-info .u-role {
            font-size: 11px;
            color: var(--text-2);
        }
        .topbar-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4a6fa5, #1a5fb4);
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            flex-shrink: 0;
            overflow: hidden;
        }
        .topbar-avatar img { width: 100%; height: 100%; object-fit: cover; }

        /* ===== PAGE BODY ===== */
        .page-body {
            flex: 1;
            padding: 28px 32px 32px;
        }

        /* ===== PROFILE HEADER BANNER ===== */
        .profile-banner {
            background: linear-gradient(120deg, #1a5fb4 0%, #0a3d6b 100%);
            border-radius: var(--radius);
            padding: 28px 32px;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 28px;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }
        /* Decorative circles */
        .profile-banner::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }
        .profile-banner::after {
            content: '';
            position: absolute;
            bottom: -80px; right: 120px;
            width: 280px; height: 280px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }

        .banner-avatar {
            width: 96px; height: 96px;
            border-radius: 16px;
            border: 3px solid rgba(255,255,255,0.4);
            object-fit: cover;
            flex-shrink: 0;
            position: relative;
            z-index: 1;
            background: #1450a0;
            display: flex; align-items: center; justify-content: center;
            font-size: 36px;
            font-weight: 700;
            color: rgba(255,255,255,0.7);
            overflow: hidden;
        }
        .banner-avatar img { width: 100%; height: 100%; object-fit: cover; }

        .banner-info {
            flex: 1;
            position: relative;
            z-index: 1;
        }
        .banner-name-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 6px;
            flex-wrap: wrap;
        }
        .banner-name {
            font-size: 22px;
            font-weight: 700;
            color: #fff;
        }
        .badge-status {
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            background: var(--amber);
            color: #0d1b2e;
            letter-spacing: 0.3px;
        }
        .badge-status.inactive {
            background: rgba(255,255,255,0.18);
            color: #fff;
        }
        .banner-nim {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 13px;
            color: rgba(255,255,255,0.75);
            margin-bottom: 18px;
        }
        .banner-nim .material-icons-outlined { font-size: 16px; }

        .banner-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }
        .btn-banner {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 9px 20px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            border: none;
        }
        .btn-banner .material-icons-outlined { font-size: 16px; }
        .btn-banner-primary {
            background: #fff;
            color: var(--blue-primary);
        }
        .btn-banner-primary:hover { background: #f0f5ff; }
        .btn-banner-secondary {
            background: rgba(255,255,255,0.12);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.25);
        }
        .btn-banner-secondary:hover { background: rgba(255,255,255,0.2); }

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
        .card-title .material-icons-outlined {
            font-size: 20px;
            color: var(--blue-primary);
        }
        .card-link {
            font-size: 12px;
            font-weight: 600;
            color: var(--blue-primary);
            text-decoration: none;
            transition: opacity 0.15s;
        }
        .card-link:hover { opacity: 0.75; }

        /* ===== ACADEMIC INFO GRID ===== */
        .academic-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
        }
        .academic-cell {
            padding: 18px 20px;
            border-bottom: 1px solid #f1f3f5;
            border-right: 1px solid #f1f3f5;
        }
        .academic-cell:nth-child(even) { border-right: none; }
        .academic-cell:nth-last-child(-n+2) { border-bottom: none; }
        .academic-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-3);
            margin-bottom: 5px;
        }
        .academic-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-1);
        }
        .status-dot {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .status-dot::before {
            content: '';
            display: inline-block;
            width: 8px; height: 8px;
            border-radius: 50%;
            background: #10b981;
            flex-shrink: 0;
        }
        .status-dot.inactive::before { background: #ef4444; }

        /* ===== STAT CARDS ===== */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-top: 20px;
        }
        .stat-card {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 18px 16px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            transition: box-shadow 0.2s;
        }
        .stat-card:hover { box-shadow: var(--shadow-md); }
        .stat-icon-wrap {
            width: 40px; height: 40px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }
        .stat-icon-wrap .material-icons-outlined { font-size: 22px; }
        .si-blue { background: #e8f2ff; color: #1a5fb4; }
        .si-indigo { background: #ede9fe; color: #6d28d9; }
        .si-amber { background: #fef3c7; color: #d97706; }
        .si-green { background: #d1fae5; color: #059669; }

        .stat-number {
            font-size: 26px;
            font-weight: 800;
            color: var(--text-1);
            line-height: 1;
        }
        .stat-label {
            font-size: 11px;
            font-weight: 500;
            color: var(--text-2);
            line-height: 1.4;
        }

        /* ===== RIGHT COLUMN CARDS ===== */
        .right-col { display: flex; flex-direction: column; gap: 16px; }

        /* Contact info items */
        .contact-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 20px;
            border-bottom: 1px solid #f1f3f5;
        }
        .contact-item:last-child { border-bottom: none; }
        .contact-icon {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: var(--blue-light);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            color: var(--blue-primary);
        }
        .contact-icon .material-icons-outlined { font-size: 20px; }
        .contact-label {
            font-size: 11px;
            color: var(--text-2);
            margin-bottom: 2px;
        }
        .contact-value {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-1);
            word-break: break-all;
        }

        /* Security card */
        .last-login-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 16px;
            margin: 16px 20px 14px;
        }
        .last-login-box .material-icons-outlined { font-size: 18px; color: var(--text-3); flex-shrink: 0; }
        .last-login-text { font-size: 12px; color: var(--text-2); font-style: italic; }
        .btn-ubah-password {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin: 0 20px;
            padding: 10px 16px;
            border: 1.5px solid var(--blue-primary);
            background: none;
            border-radius: 9px;
            color: var(--blue-primary);
            font-size: 13px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: background 0.18s, color 0.18s;
        }
        .btn-ubah-password:hover { background: var(--blue-light); }
        .btn-ubah-password .material-icons-outlined { font-size: 17px; }
        .security-hint {
            font-size: 11px;
            color: var(--text-3);
            text-align: center;
            padding: 10px 20px 18px;
            line-height: 1.6;
        }

        /* Bantuan card */
        .card-bantuan {
            background: linear-gradient(135deg, #1a5fb4 0%, #0a3d6b 100%);
            border-radius: var(--radius);
            padding: 22px 20px;
            color: #fff;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }
        .card-bantuan::after {
            content: '';
            position: absolute;
            bottom: -40px; right: -30px;
            width: 130px; height: 130px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }
        .bantuan-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 7px;
            position: relative; z-index: 1;
        }
        .bantuan-desc {
            font-size: 12px;
            color: rgba(255,255,255,0.75);
            line-height: 1.6;
            margin-bottom: 16px;
            position: relative; z-index: 1;
        }
        .btn-bantuan {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 700;
            color: var(--amber);
            text-decoration: none;
            transition: color 0.15s;
            position: relative; z-index: 1;
        }
        .btn-bantuan:hover { color: #fff; }
        .btn-bantuan .material-icons-outlined { font-size: 16px; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1100px) {
            .content-grid { grid-template-columns: 1fr; }
            .right-col { display: grid; grid-template-columns: 1fr 1fr; }
            .stat-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 768px) {
            :root { --sidebar-w: 0px; }
            .sidebar { display: none; }
            .main { margin-left: 0; }
            .topbar { padding: 0 16px; }
            .page-body { padding: 16px; }
            .profile-banner { flex-direction: column; text-align: center; padding: 24px 20px; }
            .banner-name-row { justify-content: center; }
            .banner-nim { justify-content: center; }
            .banner-actions { justify-content: center; }
            .right-col { grid-template-columns: 1fr; }
            .academic-grid { grid-template-columns: 1fr; }
            .academic-cell { border-right: none; }
        }
        @media (max-width: 500px) {
            .stat-grid { grid-template-columns: repeat(2, 1fr); }
            .topbar-search { display: none; }
        }
    </style>
</head>
<body>
<div class="shell">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-name">SIMAKATA</div>
            <div class="brand-sub">Academic Management</div>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('user.dashboard') }}" id="nav-dashboard" class="nav-item">
                <span class="material-icons-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a href="#" id="nav-kp" class="nav-item">
                <span class="material-icons-outlined">work_outline</span>
                <span>Input KP/Magang</span>
            </a>
            <a href="#" id="nav-ta" class="nav-item">
                <span class="material-icons-outlined">description</span>
                <span>Input Tugas Akhir</span>
            </a>
            <a href="#" id="nav-rekomendasi" class="nav-item">
                <span class="material-icons-outlined">location_on</span>
                <span>Rekomendasi Lokasi</span>
            </a>
            <a href="#" id="nav-riwayat" class="nav-item">
                <span class="material-icons-outlined">history</span>
                <span>Riwayat Aktivitas</span>
            </a>
            <a href="{{ route('user.profil') }}" id="nav-profil" class="nav-item active">
                <span class="material-icons-outlined">person</span>
                <span>Profil</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
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

        {{-- Top Navbar --}}
        <header class="topbar">
            <div class="topbar-search">
                <span class="material-icons-outlined">search</span>
                <input type="text" placeholder="Cari aktivitas atau dokumen..." id="topbar-search-input">
            </div>

            <div class="topbar-right">
                <button class="topbar-icon-btn" id="btn-notif" aria-label="Notifikasi">
                    <span class="material-icons-outlined">notifications</span>
                    <span class="notif-dot"></span>
                </button>
                <button class="topbar-icon-btn" id="btn-help" aria-label="Bantuan">
                    <span class="material-icons-outlined">help_outline</span>
                </button>
                <div class="topbar-divider"></div>
                <div class="topbar-user" id="topbar-user">
                    <div class="topbar-user-info">
                        <div class="u-name">{{ $user->nama_lengkap ?? 'Mahasiswa' }}</div>
                        <div class="u-role">Mahasiswa</div>
                    </div>
                    <div class="topbar-avatar">
                        {{ strtoupper(substr($user->nama_lengkap ?? 'M', 0, 1)) }}
                    </div>
                </div>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="page-body">

                        <div style='background: white; border-radius: 14px; padding: 30px; box-shadow: 0 1px 4px rgba(0,0,0,0.07);'>
                <h2 style='margin-bottom: 20px; font-size: 20px;'>Edit Profil</h2>
                <form action='{{ route("user.profil.update") }}' method='POST' enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Foto Profil (Opsional)</label>
                        @if($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 10px; display: block;">
                        @endif
                        <input type="file" name="avatar" accept="image/*" style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Nama Lengkap</label>
                        <input type='text' name='nama_lengkap' value='{{ old("nama_lengkap", $user->nama_lengkap) }}' required style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Email</label>
                        <input type='email' name='email' value='{{ old("email", $user->email) }}' required style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>NIM</label>
                        <input type='text' name='nim' value='{{ old("nim", $user->nim) }}' required style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Angkatan</label>
                        <input type='text' name='angkatan' value='{{ old("angkatan", $user->angkatan) }}' style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Program Studi</label>
                        <input type='text' name='program_studi' value='{{ old("program_studi", $user->program_studi) }}' style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Nomor Telepon</label>
                        <input type='text' name='nomor_telepon' value='{{ old("nomor_telepon", $user->nomor_telepon) }}' style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='margin-bottom: 24px;'>
                        <label style='display:block; margin-bottom:8px; font-weight:600; font-size:13px;'>Password Baru (Opsional)</label>
                        <input type='password' name='password' placeholder='Kosongkan jika tidak ingin mengubah' style='width:100%; padding:10px; border:1px solid #e5e7eb; border-radius:8px;'>
                    </div>
                    
                    <div style='display:flex; gap:12px;'>
                        <button type='submit' style='padding:10px 20px; background:#1a5fb4; color:white; border:none; border-radius:8px; font-weight:600; cursor:pointer;'>Simpan Perubahan</button>
                        <a href='{{ route("user.profil") }}' style='padding:10px 20px; background:#f3f4f6; color:#374151; border:none; border-radius:8px; font-weight:600; text-decoration:none; display:inline-block;'>Batal</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
</body>
</html>