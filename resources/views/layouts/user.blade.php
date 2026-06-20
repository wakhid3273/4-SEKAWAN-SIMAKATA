<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIMAKATA - Sistem Informasi Mahasiswa Kerja Praktek dan Tugas Akhir">
    <title>@yield('title', 'Dashboard') — SIMAKATA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            --accent-blue-light: #e8f0fb;
            --amber: #f4a807;
            --text-1: #111827;
            --text-2: #6b7280;
            --text-3: #9ca3af;
            --text-muted: #9ca3af;
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

        /* ===== FOOTER ===== */
        .user-page-footer {
            background: #f8fafc;
            border-top: 1px solid var(--border);
            padding: 32px 32px 20px;
            margin-top: 12px;
        }
        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }
        .footer-brand-name {
            font-size: 16px;
            font-weight: 800;
            color: var(--blue-primary);
            letter-spacing: 1px;
            margin-bottom: 6px;
        }
        .footer-brand-desc {
            font-size: 12px;
            color: var(--text-2);
            line-height: 1.6;
        }
        .footer-contact {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #ffffff;
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-2);
            transition: all 0.2s;
            text-decoration: none;
        }
        .social-icon:hover {
            background: var(--accent-blue-light);
            color: var(--blue-primary);
            border-color: rgba(26, 95, 180, 0.2);
        }
        .social-icon .material-icons-outlined {
            font-size: 18px;
        }
        .footer-bottom {
            padding-top: 16px;
            border-top: 1px solid var(--border);
            font-size: 11px;
            color: var(--text-muted);
            text-align: center;
            margin-top: 20px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            :root { --sidebar-w: 0px; }
            .sidebar { display: none; }
            .main { margin-left: 0; }
            .topbar { padding: 0 16px; }
            .page-body { padding: 16px; }
            .topbar-search { display: none; }
            .user-page-footer { padding: 24px 20px 16px; }
            .footer-inner { 
                flex-direction: column; 
                align-items: flex-start;
                gap: 16px;
            }
        }
    </style>
    @yield('extra_styles')
</head>
<body>
<div class="shell">
    {{-- ===== SIDEBAR ===== --}}
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-name">SIMAKATA</div>
            <div class="brand-sub">Academic Management</div>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('user.dashboard') }}" class="nav-item {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                <span class="material-icons-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a href="#" class="nav-item">
                <span class="material-icons-outlined">work_outline</span>
                <span>Input KP/Magang</span>
            </a>
            <a href="#" class="nav-item">
                <span class="material-icons-outlined">description</span>
                <span>Input Tugas Akhir</span>
            </a>
            <a href="#" class="nav-item">
                <span class="material-icons-outlined">history</span>
                <span>Riwayat Aktivitas</span>
            </a>
            <a href="{{ route('user.profil') }}" class="nav-item {{ request()->routeIs('user.profil*') ? 'active' : '' }}">
                <span class="material-icons-outlined">person</span>
                <span>Profil</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">
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
                <input type="text" placeholder="Cari aktivitas atau dokumen...">
            </div>

            <div class="topbar-right">
                <div class="topbar-divider"></div>
                <div class="topbar-user">
                    <div class="topbar-user-info">
                        <div class="u-name">{{ Auth::user()->nama_lengkap ?? 'Mahasiswa' }}</div>
                        <div class="u-role">Mahasiswa</div>
                    </div>
                    <div class="topbar-avatar">
                        @if(Auth::user()->avatar)
                            <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="Avatar">
                        @else
                            {{ strtoupper(substr(Auth::user()->nama_lengkap ?? 'M', 0, 1)) }}
                        @endif
                    </div>
                </div>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="page-body">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="user-page-footer">
            <div class="footer-inner">
                <div>
                    <div class="footer-brand-name">SIMAKATA</div>
                    <p class="footer-brand-desc">Managed by 4 Sekawan</p>
                </div>
                <div class="footer-contact">
                    <a href="https://wa.me/6281234567890" target="_blank" class="social-icon" title="Hubungi Admin via WhatsApp">
                        <span class="material-icons-outlined">chat</span>
                    </a>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; 2026 4 Sekawan
            </div>
        </footer>
    </div>
</div>

@yield('scripts')
</body>
</html>
