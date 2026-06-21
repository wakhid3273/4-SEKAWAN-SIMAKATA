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
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/animations.js') }}" defer></script>
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
            z-index: 300;
            overflow-y: auto;
            scrollbar-width: none;
            transition: transform 0.3s ease;
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

        /* Mobile topbar hidden on desktop, shown on mobile via media query */
        .mobile-topbar { display: none; }

        /* ===== MOBILE FULLSCREEN NAV OVERLAY ===== */
        .mobile-nav-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: #ffffff;
            z-index: 500;
            flex-direction: column;
            opacity: 0;
            transform: scale(0.98);
            transition: opacity 0.25s ease, transform 0.25s ease;
        }
        .mobile-nav-overlay.active {
            display: flex;
            opacity: 1;
            transform: scale(1);
        }
        .mobile-nav-overlay-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-bottom: 1px solid #f0f2f5;
        }
        .mobile-nav-overlay-brand {
            font-size: 18px;
            font-weight: 800;
            color: var(--accent-blue);
            letter-spacing: 1.5px;
        }
        .mobile-nav-close-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            border: none;
            color: #374151;
            cursor: pointer;
            border-radius: 8px;
            transition: background 0.2s;
        }
        .mobile-nav-close-btn:hover { background: #f3f4f6; }
        .mobile-nav-close-btn .material-icons-outlined { font-size: 26px; }

        /* User info in overlay */
        .mobile-nav-user {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 24px 28px 20px;
            border-bottom: 1px solid #f0f2f5;
        }
        .mobile-nav-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4a6fa5, var(--accent-blue));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            color: #fff;
            flex-shrink: 0;
            overflow: hidden;
        }
        .mobile-nav-avatar img {
            width: 100%; height: 100%; object-fit: cover;
        }
        .mobile-nav-user-name {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
        }
        .mobile-nav-user-role {
            font-size: 11px;
            color: #9ca3af;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 2px;
        }

        /* Nav items in overlay */
        .mobile-nav-links {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 16px 20px;
            gap: 4px;
            overflow-y: auto;
        }
        .mobile-nav-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 16px;
            border-radius: 12px;
            color: #374151;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: background 0.15s ease, color 0.15s ease;
        }
        .mobile-nav-item .material-icons-outlined {
            font-size: 22px;
            color: #9ca3af;
            flex-shrink: 0;
        }
        .mobile-nav-item:hover {
            background: #f3f6fb;
            color: var(--accent-blue);
        }
        .mobile-nav-item:hover .material-icons-outlined {
            color: var(--accent-blue);
        }
        .mobile-nav-item.active {
            background: var(--accent-blue-light);
            color: var(--accent-blue);
            font-weight: 700;
        }
        .mobile-nav-item.active .material-icons-outlined {
            color: var(--accent-blue);
        }
        .mobile-nav-divider {
            height: 1px;
            background: #f0f2f5;
            margin: 8px 0;
        }
        .mobile-nav-logout-btn {
            display: flex;
            align-items: center;
            gap: 16px;
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            background: none;
            border: none;
            color: #ef4444;
            font-size: 15px;
            font-weight: 500;
            font-family: inherit;
            cursor: pointer;
            text-align: left;
            transition: background 0.15s ease;
        }
        .mobile-nav-logout-btn .material-icons-outlined {
            font-size: 22px;
            color: #ef4444;
        }
        .mobile-nav-logout-btn:hover { background: #fef2f2; }

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
            color: var(--accent-blue);
            letter-spacing: 1px;
            margin-bottom: 6px;
        }
        .footer-brand-desc {
            font-size: 12px;
            color: var(--text-secondary);
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
            color: var(--text-secondary);
            transition: all 0.2s;
            text-decoration: none;
        }
        .social-icon:hover {
            background: var(--accent-blue-light);
            color: var(--accent-blue);
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
        @media (max-width: 1024px) {
            .sidebar {
                width: 70px;
                min-width: 70px;
            }
            .sidebar-logo { 
                font-size: 14px; 
                padding: 24px 8px 16px;
                text-align: center;
                letter-spacing: 1px;
            }
            .sidebar-user-info, 
            .nav-item span:not(.material-icons-outlined),
            .btn-logout span:not(.material-icons-outlined) {
                display: none;
            }
            .nav-item, .btn-logout { 
                justify-content: center; 
                padding: 12px 8px; 
            }
            .sidebar-user { 
                justify-content: center; 
                padding: 14px 8px; 
            }
            .main-content { margin-left: 70px; }
            .page-body { padding: 24px 20px; }
        }

        @media (max-width: 768px) {
            /* Sidebar desktop disembunyikan total di mobile */
            .sidebar {
                display: none !important;
            }

            /* Main content ambil penuh */
            .main-content {
                margin-left: 0;
            }

            .page-body {
                padding: 16px;
            }

            .page-header {
                flex-direction: column;
                align-items: stretch;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .admin-page-footer {
                padding: 24px 20px 16px;
            }

            .footer-inner {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            /* ===== MOBILE TOPBAR ===== */
            .mobile-topbar {
                display: flex !important;
                align-items: center;
                justify-content: space-between;
                background: #ffffff;
                padding: 12px 20px;
                border-bottom: 1px solid #e5e7eb;
                position: sticky;
                top: 0;
                z-index: 200;
                box-shadow: 0 1px 6px rgba(0,0,0,0.06);
            }
            .mobile-topbar-brand {
                font-size: 18px;
                font-weight: 800;
                color: var(--accent-blue);
                letter-spacing: 1.5px;
            }
            .mobile-menu-btn {
                display: flex !important;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
                background: none;
                border: none;
                color: #374151;
                cursor: pointer;
                border-radius: 8px;
                transition: background 0.2s;
            }
            .mobile-menu-btn:hover { background: #f3f4f6; }
            .mobile-menu-btn .material-icons-outlined { font-size: 26px; }
        }

        @media (max-width: 600px) {
            .page-body { 
                padding: 12px 12px; 
            }
            
            .page-header h1 {
                font-size: 20px;
            }
            
            .page-header .subtitle {
                font-size: 12px;
            }
            
            .admin-page-footer {
                padding: 20px 16px 12px;
            }
            
            .footer-brand-name {
                font-size: 15px;
            }
            
            .footer-brand-desc {
                font-size: 11px;
            }
        }
    </style>
    @yield('extra_styles')
</head>
<body>
<div class="admin-shell">

    {{-- ===== FULLSCREEN MOBILE NAV OVERLAY ===== --}}
    <div class="mobile-nav-overlay" id="mobileNavOverlay">
        {{-- Header --}}
        <div class="mobile-nav-overlay-header">
            <span class="mobile-nav-overlay-brand">SIMAKATA</span>
            <button class="mobile-nav-close-btn" id="mobileNavCloseBtn">
                <span class="material-icons-outlined">close</span>
            </button>
        </div>

        {{-- User Info --}}
        <a href="{{ route('admin.profil') }}" style="text-decoration:none;" onclick="closeMobileNav()">
            <div class="mobile-nav-user">
                <div class="mobile-nav-avatar">
                    @if(auth()->check() && auth()->user()->profile_photo)
                        <img src="{{ Storage::url(auth()->user()->profile_photo) }}" alt="Avatar">
                    @elseif(auth()->check() && auth()->user()->avatar)
                        <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="Avatar">
                    @else
                        {{ strtoupper(substr(auth()->user()->nama_lengkap ?? 'A', 0, 1)) }}
                    @endif
                </div>
                <div>
                    <div class="mobile-nav-user-name">{{ auth()->user()->nama_lengkap ?? 'Admin Panel' }}</div>
                    <div class="mobile-nav-user-role">System Administrator</div>
                </div>
            </div>
        </a>

        {{-- Nav Links --}}
        <div class="mobile-nav-links">
            <a href="{{ route('landing') }}" class="mobile-nav-item" onclick="closeMobileNav()">
                <span class="material-icons-outlined">home</span>
                <span>Home</span>
            </a>
            <a href="{{ route('admin.dashboard') }}" class="mobile-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" onclick="closeMobileNav()">
                <span class="material-icons-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.perusahaan.index') }}" class="mobile-nav-item {{ request()->routeIs('admin.perusahaan*') ? 'active' : '' }}" onclick="closeMobileNav()">
                <span class="material-icons-outlined">business</span>
                <span>Kelola Perusahaan</span>
            </a>
            <a href="{{ route('admin.verifikasi.index') }}" class="mobile-nav-item {{ request()->routeIs('admin.verifikasi*') ? 'active' : '' }}" onclick="closeMobileNav()">
                <span class="material-icons-outlined">verified_user</span>
                <span>Verifikasi Data</span>
            </a>
            <a href="{{ route('admin.mahasiswa.index') }}" class="mobile-nav-item {{ request()->routeIs('admin.mahasiswa*') ? 'active' : '' }}" onclick="closeMobileNav()">
                <span class="material-icons-outlined">people</span>
                <span>Data Mahasiswa</span>
            </a>

            <div class="mobile-nav-divider"></div>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" class="mobile-nav-logout-btn">
                    <span class="material-icons-outlined">logout</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>

    {{-- ===== SIDEBAR (desktop only) ===== --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-logo">SIMAKATA</div>

        {{-- Admin user info --}}
        <a href="{{ route('admin.profil') }}" style="text-decoration:none;">
            <div class="sidebar-user" style="cursor:pointer; {{ request()->routeIs('admin.profil') ? 'background: rgba(255,255,255,0.08);' : '' }}">
                <div class="sidebar-user-avatar">
                    @if(auth()->check() && auth()->user()->profile_photo)
                        <img src="{{ Storage::url(auth()->user()->profile_photo) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                    @elseif(auth()->check() && auth()->user()->avatar)
                        <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                    @else
                        {{ strtoupper(substr(auth()->user()->nama_lengkap ?? 'A', 0, 1)) }}
                    @endif
                </div>
                <div class="sidebar-user-info">
                    <div class="name">{{ auth()->user()->nama_lengkap ?? 'Admin Panel' }}</div>
                    <div class="role">System Administrator</div>
                </div>
            </div>
        </a>

        {{-- Navigation --}}
        <nav class="sidebar-nav">
            <a href="{{ route('landing') }}" id="nav-home" class="nav-item" title="Ke Landing Page">
                <span class="material-icons-outlined">home</span>
                <span>Home</span>
            </a>
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
        {{-- Mobile Topbar (only visible on mobile) --}}
        <div class="mobile-topbar">
            <div class="mobile-topbar-brand">SIMAKATA</div>
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Buka menu">
                <span class="material-icons-outlined">menu</span>
            </button>
        </div>

        <div class="page-body">
            @yield('content')
        </div>

        {{-- Footer --}}
        <footer class="admin-page-footer">
            <div class="footer-inner">
                <div>
                    <div class="footer-brand-name">SIMAKATA</div>
                    <p class="footer-brand-desc">Managed by 4 Sekawan</p>
                </div>
                <div class="footer-contact">
                    <a href="https://wa.me/6288233037896?text=Halo%20Admin%20SIMAKATA,%20saya%20butuh%20bantuan" target="_blank" class="social-icon" title="Hubungi Admin via WhatsApp">
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

<script>
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileNavOverlay = document.getElementById('mobileNavOverlay');
    const mobileNavCloseBtn = document.getElementById('mobileNavCloseBtn');

    function openMobileNav() {
        mobileNavOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileNav() {
        mobileNavOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', openMobileNav);
    }

    if (mobileNavCloseBtn) {
        mobileNavCloseBtn.addEventListener('click', closeMobileNav);
    }

    // Tutup overlay saat layar diperbesar ke desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            closeMobileNav();
        }
    });
</script>

@yield('scripts')
</body>
</html>
