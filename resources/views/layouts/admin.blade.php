<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIMAKATA Admin Panel - Sistem Informasi Mahasiswa Kerja Praktek dan Tugas Akhir">
    <title>@yield('title', 'Admin') — SIMAKATA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        /* ===== RESET ===== */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --sidebar-width: 220px;
            --sidebar-bg: #0d1b2e;
            --sidebar-hover: rgba(255,255,255,0.06);
            --sidebar-active-bg: #f4a807;
            --sidebar-active-text: #0d1b2e;
            --accent-blue: #1a5fb4;
            --accent-blue-light: #e8f0fb;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --text-muted: #9ca3af;
            --border: #e5e7eb;
            --bg-page: #f3f6fb;
            --card-bg: #ffffff;
            --radius: 14px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
        }

        html, body {
            height: 100%;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-page);
            color: var(--text-primary);
            font-size: 14px;
        }

        /* ===== LAYOUT ===== */
        .admin-shell {
            display: flex;
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: var(--sidebar-width);
            min-width: var(--sidebar-width);
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 100;
            overflow-y: auto;
            scrollbar-width: none;
        }
        .sidebar::-webkit-scrollbar { display: none; }

        .sidebar-logo {
            padding: 28px 22px 20px;
            color: #ffffff;
            font-size: 17px;
            font-weight: 800;
            letter-spacing: 2px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        /* Admin user info */
        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .sidebar-user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4a6fa5, #1a5fb4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            color: #fff;
            flex-shrink: 0;
        }
        .sidebar-user-info .name {
            font-size: 13px;
            font-weight: 600;
            color: #ffffff;
            line-height: 1.2;
        }
        .sidebar-user-info .role {
            font-size: 10px;
            font-weight: 500;
            color: rgba(255,255,255,0.45);
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-top: 2px;
        }

        /* Nav items */
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
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: background 0.18s ease, color 0.18s ease;
            cursor: pointer;
        }
        .nav-item .material-icons-outlined {
            font-size: 20px;
            flex-shrink: 0;
        }
        .nav-item:hover {
            background: var(--sidebar-hover);
            color: rgba(255,255,255,0.9);
        }
        .nav-item.active {
            background: var(--sidebar-active-bg);
            color: var(--sidebar-active-text);
            font-weight: 600;
        }
        .nav-item.active .material-icons-outlined {
            color: var(--sidebar-active-text);
        }

        /* Logout at bottom */
        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        .sidebar-footer form { margin: 0; }
        .btn-logout {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            padding: 10px 12px;
            border-radius: 10px;
            background: none;
            border: none;
            color: rgba(255,255,255,0.5);
            font-size: 13px;
            font-weight: 500;
            font-family: inherit;
            cursor: pointer;
            transition: background 0.18s ease, color 0.18s ease;
            text-align: left;
        }
        .btn-logout .material-icons-outlined { font-size: 20px; }
        .btn-logout:hover {
            background: rgba(239,68,68,0.12);
            color: #f87171;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .page-body {
            flex: 1;
            padding: 32px 32px 24px;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 28px;
            gap: 16px;
            flex-wrap: wrap;
        }
        .page-header h1 {
            font-size: 26px;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.2;
        }
        .page-header .subtitle {
            font-size: 13px;
            color: var(--text-secondary);
            margin-top: 4px;
        }

        /* ===== CARDS & GRID ===== */
        .card {
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(0,0,0,0.04);
        }

        /* ===== FOOTER ===== */
        .admin-page-footer {
            background: var(--card-bg);
            border-top: 1px solid var(--border);
            padding: 28px 32px;
            margin-top: 12px;
        }
        .footer-inner {
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 32px;
            align-items: start;
        }
        .footer-brand-name {
            font-size: 16px;
            font-weight: 800;
            color: var(--accent-blue);
            letter-spacing: 1.5px;
            margin-bottom: 8px;
        }
        .footer-brand-desc {
            font-size: 12px;
            color: var(--text-secondary);
            line-height: 1.6;
            max-width: 240px;
        }
        .footer-links h4 {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-primary);
            margin-bottom: 10px;
        }
        .footer-links a {
            display: block;
            font-size: 12px;
            color: var(--text-secondary);
            text-decoration: none;
            margin-bottom: 6px;
            transition: color 0.2s;
        }
        .footer-links a:hover { color: var(--accent-blue); }
        .footer-copy {
            font-size: 11px;
            color: var(--text-muted);
            text-align: right;
            line-height: 1.6;
        }
        .footer-copy-icons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .footer-icon-btn {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 1px solid var(--border);
            background: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-secondary);
            transition: border-color 0.2s, color 0.2s;
        }
        .footer-icon-btn:hover { border-color: var(--accent-blue); color: var(--accent-blue); }
        .footer-icon-btn .material-icons-outlined { font-size: 14px; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 900px) {
            .sidebar {
                width: 64px;
                min-width: 64px;
            }
            .sidebar-logo, .sidebar-user-info, .nav-item span:not(.material-icons-outlined),
            .btn-logout span:not(.material-icons-outlined), .sidebar-user-avatar + .sidebar-user-info {
                display: none;
            }
            .nav-item, .btn-logout { justify-content: center; padding: 12px; }
            .sidebar-user { justify-content: center; padding: 16px 0; }
            .main-content { margin-left: 64px; }
            .page-body { padding: 20px 16px; }
            .footer-inner { grid-template-columns: 1fr; gap: 20px; }
            .footer-copy { text-align: left; }
            .footer-copy-icons { justify-content: flex-start; }
        }

        @media (max-width: 600px) {
            .page-body { padding: 16px 12px; }
        }
    </style>
    @yield('extra_styles')
</head>
<body>
<div class="admin-shell">
    {{-- ===== SIDEBAR ===== --}}
    <aside class="sidebar">
        <div class="sidebar-logo">SIMAKATA</div>

        {{-- Admin user info --}}
        <a href="{{ route('admin.profil') }}" style="text-decoration:none;">
            <div class="sidebar-user" style="cursor:pointer; {{ request()->routeIs('admin.profil') ? 'background: rgba(255,255,255,0.08);' : '' }}">
                <div class="sidebar-user-avatar">A</div>
                <div class="sidebar-user-info">
                    <div class="name">{{ auth()->user()->nama_lengkap ?? 'Admin Panel' }}</div>
                    <div class="role">System Administrator</div>
                </div>
            </div>
        </a>

        {{-- Navigation --}}
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" id="nav-dashboard"
               class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="material-icons-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.perusahaan.index') }}" id="nav-perusahaan" class="nav-item {{ request()->routeIs('admin.perusahaan*') ? 'active' : '' }}">
                <span class="material-icons-outlined">business</span>
                <span>Kelola Perusahaan</span>
            </a>
            <a href="{{ route('admin.verifikasi.index') }}" id="nav-verifikasi" class="nav-item {{ request()->routeIs('admin.verifikasi*') ? 'active' : '' }}">
                <span class="material-icons-outlined">verified_user</span>
                <span>Verifikasi Data</span>
            </a>
            <a href="{{ route('admin.mahasiswa.index') }}" id="nav-mahasiswa" class="nav-item {{ request()->routeIs('admin.mahasiswa*') ? 'active' : '' }}">
                <span class="material-icons-outlined">people</span>
                <span>Data Mahasiswa</span>
            </a>
        </nav>

        {{-- Logout --}}
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <span class="material-icons-outlined">logout</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- ===== MAIN ===== --}}
    <div class="main-content">
        <div class="page-body">
            @yield('content')
        </div>

        {{-- Footer --}}
        <footer class="admin-page-footer">
            <div class="footer-inner">
                <div>
                    <div class="footer-brand-name">SIMAKATA</div>
                    <p class="footer-brand-desc">The official management system for Informatics Final Projects and Internship tracking.</p>
                </div>
                <div class="footer-links">
                    <h4>Admin Quick Links</h4>
                    <a href="#">Audit Logs</a>
                    <a href="#">System Configuration</a>
                    <a href="#">Report Center</a>
                </div>
                <div class="footer-copy">
                    &copy; 2024 HMIF Informatics SIMAKATA. All rights reserved.
                    <div class="footer-copy-icons">
                        <button class="footer-icon-btn" title="Help">
                            <span class="material-icons-outlined">help_outline</span>
                        </button>
                        <button class="footer-icon-btn" title="Settings">
                            <span class="material-icons-outlined">settings</span>
                        </button>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@yield('scripts')
</body>
</html>
