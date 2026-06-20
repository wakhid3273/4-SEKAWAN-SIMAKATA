<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIMAKATA - Pusat informasi magang dan TA bagi mahasiswa Informatika. Temukan peluang karir terbaik dan kelola perjalanan akademik Anda.">
    <title>SIMAKATA - Sistem Informasi Magang, Kerja Praktik, dan Tugas Akhir</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Animations CSS -->
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <script src="{{ asset('js/animations.js') }}" defer></script>
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
            background: var(--white);
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
        .navbar-links a:hover { color: var(--blue-main); }
        .navbar-links a:hover::after { width: 100%; }
        .navbar-links a.active { color: var(--blue-main); font-weight: 600; }

        .navbar-actions { display: flex; align-items: center; gap: 12px; }

        .btn-nav-login {
            padding: 8px 20px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 600;
            color: var(--blue-main);
            border: 1.5px solid var(--blue-main);
            background: transparent;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-nav-login:hover { background: var(--blue-pale); }

        .btn-nav-register {
            padding: 8px 20px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 600;
            color: var(--white);
            background: var(--blue-main);
            border: 1.5px solid var(--blue-main);
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-nav-register:hover { background: var(--blue-dark); border-color: var(--blue-dark); }

        .btn-nav-logout {
            padding: 8px 20px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 600;
            color: #dc2626;
            border: 1.5px solid #fca5a5;
            background: #fff5f5;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-nav-logout:hover { background: #fee2e2; }

        /* Mobile hamburger */
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 4px;
        }
        .hamburger span {
            display: block;
            width: 22px;
            height: 2px;
            background: var(--text-mid);
            border-radius: 99px;
            transition: all 0.3s;
        }

        /* ===== HERO SECTION ===== */
        .hero {
            min-height: calc(100vh - 64px);
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #f0f6ff 0%, #f8fafc 50%, #fffbf0 100%);
            padding: 60px 40px;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(37,99,235,0.07) 0%, transparent 70%);
            pointer-events: none;
        }
        .hero::after {
            content: '';
            position: absolute;
            bottom: -100px; left: -60px;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(244,168,7,0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-inner {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 60px;
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--blue-light);
            color: var(--blue-main);
            border-radius: 99px;
            padding: 5px 14px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 20px;
            border: 1px solid rgba(37,99,235,0.15);
        }
        .hero-badge .dot {
            width: 6px; height: 6px;
            background: var(--blue-main);
            border-radius: 50%;
            animation: blink 2s ease-in-out infinite;
        }
        @keyframes blink { 0%,100% { opacity:1; } 50% { opacity:0.3; } }

        .hero-title {
            font-size: 44px;
            font-weight: 800;
            line-height: 1.18;
            color: var(--text-dark);
            margin-bottom: 18px;
            letter-spacing: -0.5px;
        }
        .hero-title .highlight { color: var(--blue-main); }

        .hero-desc {
            font-size: 15px;
            color: var(--text-gray);
            line-height: 1.7;
            margin-bottom: 32px;
            max-width: 480px;
        }

        .hero-cta { display: flex; align-items: center; gap: 14px; flex-wrap: wrap; }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 26px;
            border-radius: var(--radius-md);
            background: var(--blue-main);
            color: var(--white);
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            border: none;
            cursor: pointer;
            transition: all 0.25s;
            box-shadow: 0 4px 16px rgba(26,95,180,0.3);
        }
        .btn-primary:hover {
            background: var(--blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(26,95,180,0.35);
        }
        .btn-primary .material-icons-outlined { font-size: 18px; }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 26px;
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--text-mid);
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            border: 1.5px solid var(--border);
            cursor: pointer;
            transition: all 0.25s;
        }
        .btn-secondary:hover {
            border-color: var(--blue-main);
            color: var(--blue-main);
            transform: translateY(-2px);
        }

        /* Hero illustration */
        .hero-visual {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .hero-img-wrap {
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            animation: float-hero 5s ease-in-out infinite;
            width: 100%;
            max-width: 480px;
        }
        .hero-img-wrap img { width: 100%; height: auto; border-radius: var(--radius-lg); }

        @keyframes float-hero {
            0%,100% { transform: translateY(0); }
            50%      { transform: translateY(-12px); }
        }

        /* Floating stat chips on illustration */
        .hero-float-chip {
            position: absolute;
            background: var(--white);
            border-radius: var(--radius-sm);
            padding: 8px 14px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            font-size: 12px;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 7px;
            animation: float-chip 4s ease-in-out infinite;
        }
        .hero-float-chip:nth-child(2) { animation-delay: 1s; }
        .hero-float-chip:nth-child(3) { animation-delay: 2s; }
        @keyframes float-chip {
            0%,100% { transform: translateY(0); }
            50%      { transform: translateY(-6px); }
        }
        .chip-dot { width: 8px; height: 8px; border-radius: 50%; }
        .chip-green { background: #22c55e; }
        .chip-blue  { background: var(--blue-main); }
        .chip-1 { bottom: 12%; left: -6%; }
        .chip-2 { top: 14%; right: -6%; }

        /* ===== STATS SECTION ===== */
        .stats-section {
            background: var(--white);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 48px 40px;
        }
        .stats-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
        }
        .stat-item {
            text-align: center;
            padding: 20px 32px;
            border-right: 1px solid var(--border);
            animation: fade-up 0.5s ease both;
        }
        .stat-item:last-child { border-right: none; }
        .stat-item:nth-child(1) { animation-delay: 0.05s; }
        .stat-item:nth-child(2) { animation-delay: 0.12s; }
        .stat-item:nth-child(3) { animation-delay: 0.19s; }

        @keyframes fade-up {
            from { opacity:0; transform: translateY(20px); }
            to   { opacity:1; transform: translateY(0); }
        }

        .stat-number {
            font-size: 42px;
            font-weight: 800;
            color: var(--blue-main);
            line-height: 1;
            margin-bottom: 6px;
        }
        .stat-label-text {
            font-size: 13px;
            color: var(--text-gray);
            font-weight: 500;
        }

        /* ===== FEATURES SECTION ===== */
        .features-section {
            padding: 80px 40px;
            background: var(--bg-page);
        }
        .section-header {
            text-align: center;
            max-width: 560px;
            margin: 0 auto 52px;
        }
        .section-label {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: var(--blue-main);
            background: var(--blue-light);
            border-radius: 99px;
            padding: 4px 14px;
            margin-bottom: 14px;
        }
        .section-title {
            font-size: 30px;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.25;
            margin-bottom: 12px;
        }
        .section-desc {
            font-size: 14px;
            color: var(--text-gray);
            line-height: 1.7;
        }

        /* Features grid */
        .features-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            position: relative;
        }

        .feature-card {
            background: var(--white);
            border-radius: var(--radius-md);
            padding: 28px 26px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            transition: all 0.25s;
            display: flex;
            gap: 18px;
            align-items: flex-start;
            animation: fade-up 0.5s ease both;
        }
        .feature-card:nth-child(1) { animation-delay: 0.1s; }
        .feature-card:nth-child(2) { animation-delay: 0.18s; }
        .feature-card:nth-child(3) { animation-delay: 0.26s; }
        .feature-card:nth-child(4) { animation-delay: 0.34s; }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: rgba(37,99,235,0.2);
        }

        /* Card accent on right (like mockup) */
        .feature-card.has-bg-right {
            position: relative;
            overflow: hidden;
        }
        .feature-card.has-bg-right::after {
            content: '';
            position: absolute;
            right: -20px; bottom: -20px;
            width: 100px; height: 100px;
            background: linear-gradient(135deg, rgba(219,234,254,0.6), rgba(219,234,254,0));
            border-radius: 50%;
            pointer-events: none;
        }

        .feature-icon {
            width: 46px; height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .feature-icon .material-icons-outlined { font-size: 22px; }
        .fi-blue   { background: var(--blue-light); color: var(--blue-main); }
        .fi-amber  { background: #fef3c7; color: #d97706; }
        .fi-teal   { background: #d1fae5; color: #059669; }
        .fi-purple { background: #ede9fe; color: #7c3aed; }

        .feature-text h3 {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 6px;
        }
        .feature-text p {
            font-size: 13px;
            color: var(--text-gray);
            line-height: 1.65;
        }

        /* ===== CTA SECTION ===== */
        .cta-section {
            padding: 80px 40px;
            background: var(--white);
        }
        .cta-inner {
            max-width: 780px;
            margin: 0 auto;
            background: linear-gradient(135deg, #f0f6ff 0%, #fafcff 100%);
            border: 1px solid rgba(37,99,235,0.12);
            border-radius: 24px;
            padding: 60px 52px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-inner::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(37,99,235,0.1) 0%, transparent 70%);
            pointer-events: none;
        }
        .cta-inner::after {
            content: '';
            position: absolute;
            bottom: -40px; left: -40px;
            width: 160px; height: 160px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(244,168,7,0.1) 0%, transparent 70%);
            pointer-events: none;
        }
        .cta-inner h2 {
            font-size: 32px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 14px;
            line-height: 1.2;
            position: relative;
            z-index: 1;
        }
        .cta-inner p {
            font-size: 14px;
            color: var(--text-gray);
            line-height: 1.7;
            margin-bottom: 32px;
            max-width: 460px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 1;
        }
        .cta-buttons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }
        .btn-cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 32px;
            border-radius: var(--radius-md);
            background: var(--blue-main);
            color: var(--white);
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            border: none;
            cursor: pointer;
            transition: all 0.25s;
            box-shadow: 0 4px 16px rgba(26,95,180,0.3);
        }
        .btn-cta-primary:hover {
            background: var(--blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(26,95,180,0.35);
        }
        .btn-cta-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 32px;
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--text-mid);
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            border: 1.5px solid var(--border);
            cursor: pointer;
            transition: all 0.25s;
        }
        .btn-cta-secondary:hover {
            border-color: var(--blue-main);
            color: var(--blue-main);
            transform: translateY(-2px);
        }

        /* ===== FOOTER ===== */
        .site-footer {
            background: #0f172a;
            padding: 52px 40px 28px;
        }
        .footer-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr;
            gap: 48px;
            padding-bottom: 36px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .footer-brand-name {
            font-size: 17px;
            font-weight: 800;
            color: var(--blue-main);
            letter-spacing: 1.5px;
            margin-bottom: 12px;
        }
        .footer-brand-desc {
            font-size: 13px;
            color: rgba(255,255,255,0.45);
            line-height: 1.7;
            max-width: 260px;
            margin-bottom: 8px;
        }
        .footer-copy-small {
            font-size: 11px;
            color: rgba(255,255,255,0.25);
            margin-top: 8px;
        }
        .footer-col h4 {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.6);
            margin-bottom: 16px;
        }
        .footer-col a {
            display: block;
            font-size: 13px;
            color: rgba(255,255,255,0.4);
            margin-bottom: 10px;
            transition: color 0.2s;
        }
        .footer-col a:hover { color: rgba(255,255,255,0.85); }

        .footer-social-icons {
            display: flex;
            gap: 10px;
            margin-top: 4px;
        }
        .social-icon {
            width: 34px; height: 34px;
            border-radius: 9px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.5);
            font-size: 13px;
            font-weight: 700;
            transition: all 0.2s;
            cursor: pointer;
        }
        .social-icon:hover {
            background: var(--blue-main);
            border-color: var(--blue-main);
            color: #fff;
        }
        .social-icon .material-icons-outlined { font-size: 17px; }

        .footer-bottom {
            max-width: 1200px;
            margin: 24px auto 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        .footer-bottom p {
            font-size: 12px;
            color: rgba(255,255,255,0.25);
        }
        .footer-bottom-links {
            display: flex;
            gap: 20px;
        }
        .footer-bottom-links a {
            font-size: 12px;
            color: rgba(255,255,255,0.3);
            transition: color 0.2s;
        }
        .footer-bottom-links a:hover { color: rgba(255,255,255,0.65); }

        /* Mobile nav overlay */
        .mobile-nav {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 998;
            background: rgba(255,255,255,0.98);
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 28px;
        }
        .mobile-nav.open { display: flex; }
        .mobile-nav a, .mobile-nav button {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-dark);
            font-family: inherit;
            background: none;
            border: none;
            cursor: pointer;
            transition: color 0.2s;
        }
        .mobile-nav a:hover, .mobile-nav button:hover { color: var(--blue-main); }
        .mobile-close {
            position: absolute;
            top: 20px; right: 24px;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-gray);
        }
        .mobile-close .material-icons-outlined { font-size: 28px; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .hero-title { font-size: 36px; }
        }
        @media (max-width: 900px) {
            .navbar { padding: 0 24px; }
            .navbar-links, .navbar-actions { display: none; }
            .hamburger { display: flex; }

            .hero { padding: 48px 24px; min-height: auto; }
            .hero-inner { grid-template-columns: 1fr; gap: 40px; }
            .hero-title { font-size: 30px; }
            .hero-visual { order: -1; }
            .hero-img-wrap { max-width: 340px; margin: 0 auto; }
            .hero-float-chip.chip-1 { bottom: 5%; left: -2%; }
            .hero-float-chip.chip-2 { top: 5%; right: -2%; }

            .stats-section { padding: 36px 24px; }
            .stats-inner { grid-template-columns: 1fr; gap: 24px; }
            .stat-item { border-right: none; border-bottom: 1px solid var(--border); padding: 16px; }
            .stat-item:last-child { border-bottom: none; }

            .features-section { padding: 56px 24px; }
            .features-grid { grid-template-columns: 1fr; }

            .cta-section { padding: 56px 24px; }
            .cta-inner { padding: 40px 24px; }
            .cta-inner h2 { font-size: 24px; }

            .site-footer { padding: 40px 24px 20px; }
            .footer-grid { grid-template-columns: 1fr; gap: 32px; }
            .footer-bottom { flex-direction: column; text-align: center; }
        }

        @media (max-width: 480px) {
            .hero-title { font-size: 26px; }
            .hero-cta { flex-direction: column; align-items: flex-start; }
            .cta-buttons { flex-direction: column; }
        }
    </style>
</head>
<body>

@include('components.navbar')

{{-- ===== HERO SECTION ===== --}}
<section class="hero" id="beranda">
    <div class="hero-inner">
        {{-- Left: Text --}}
        <div class="hero-content">
            <div class="hero-badge">
                <span class="dot"></span>
                Platform Resmi HMIF Informatika
            </div>
            <h1 class="hero-title">
                SIMAKATA - Sistem Informasi
                <span class="highlight">Magang</span>, Kerja Praktik, dan
                <span class="highlight">Tugas Akhir</span>
            </h1>
            <p class="hero-desc">
                Pusat informasi magang dan TA bagi mahasiswa Informatika. Temukan peluang karir terbaik dan kelola perjalanan akademik Anda secara profesional dalam satu platform terintegrasi.
            </p>
            <div class="hero-cta">
                @guest
                    <a href="#features" class="btn-primary" id="btn-hero-database">
                        <span class="material-icons-outlined">corporate_fare</span>
                        Lihat Database Perusahaan
                    </a>
                    <a href="{{ route('register.form') }}" class="btn-secondary" id="btn-hero-register">Daftar Akun</a>
                    <a href="{{ route('login.form') }}" class="btn-secondary" id="btn-hero-login">Login</a>
                @endguest
                @auth
                    <a href="#features" class="btn-primary" id="btn-hero-dashboard">
                        <span class="material-icons-outlined">info</span>
                        Lihat Fitur Utama Platform
                    </a>
                @endauth
            </div>
        </div>

        {{-- Right: Illustration --}}
        <div class="hero-visual">
            <div class="hero-img-wrap">
                <img src="{{ asset('images/landing-hero.png') }}" alt="SIMAKATA illustration - mahasiswa berkolaborasi menggunakan platform digital">
            </div>

            {{-- Floating chips --}}
            <div class="hero-float-chip chip-1">
                <span class="chip-dot chip-green"></span>
                {{ $perusahaanCount ?? '50+' }} Perusahaan Aktif
            </div>
            <div class="hero-float-chip chip-2">
                <span class="chip-dot chip-blue"></span>
                {{ $mahasiswaKpCount ?? '150+' }} Judul Kerja Praktik
            </div>
        </div>
    </div>
</section>

{{-- ===== STATS SECTION ===== --}}
<section class="stats-section">
    <div class="stats-inner">
        <div class="stat-item">
            <div class="stat-number" data-count="{{ $perusahaanCount ?? 50 }}" data-duration="2000">0</div>
            <div class="stat-label-text">Perusahaan Terdaftar</div>
        </div>
        <div class="stat-item">
            <div class="stat-number" data-count="{{ $mahasiswaMagangCount ?? 120 }}" data-duration="2200">0</div>
            <div class="stat-label-text">Mahasiswa Magang</div>
        </div>
        <div class="stat-item">
            <div class="stat-number" data-count="{{ $mahasiswaKpCount ?? 150 }}" data-duration="2400">0</div>
            <div class="stat-label-text">Kerja Praktik</div>
        </div>
    </div>
</section>

{{-- ===== FEATURES SECTION ===== --}}
<section class="features-section" id="features">
    <div class="section-header">
        <span class="section-label">Platform Features</span>
        <h2 class="section-title">Fitur Utama Platform</h2>
        <p class="section-desc">Dirancang untuk memudahkan administrasi dan pencarian informasi akademik bagi civitas Informatika.</p>
    </div>

    <div class="features-grid">
        {{-- Feature 1: Database Perusahaan --}}
        <a href="{{ route('perusahaan.index') }}" class="feature-card has-bg-right" data-animate id="feature-database-perusahaan" style="display:block; text-decoration:none; color:inherit; cursor:pointer; transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.10)'" onmouseout="this.style.transform=''; this.style.boxShadow=''">
            <div class="feature-icon fi-blue">
                <span class="material-icons-outlined">corporate_fare</span>
            </div>
            <div class="feature-text">
                <h3>Database Perusahaan</h3>
                <p>Akses ribuan profil perusahaan teknologi ternama yang siap menerima mahasiswa magang dan kerja praktik dengan skema kerja sama yang jelas.</p>
            </div>
        </a>

        {{-- Feature 2: Validasi Judul TA --}}
        <a href="{{ route('judul-ta.index') }}" class="feature-card has-bg-right" data-animate id="feature-validasi-ta" style="display:block; text-decoration:none; color:inherit; cursor:pointer; transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.10)'" onmouseout="this.style.transform=''; this.style.boxShadow=''">
            <div class="feature-icon fi-amber">
                <span class="material-icons-outlined">verified_user</span>
            </div>
            <div class="feature-text">
                <h3>Validasi Judul TA</h3>
                <p>Proses pengajuan dan verifikasi judul Tugas Akhir yang lebih cepat, transparan, dan terdokumentasi.</p>
            </div>
        </a>

        {{-- Feature 3: Rekomendasi Magang --}}
        <a href="{{ route('perusahaan.index') }}" class="feature-card has-bg-right" id="feature-rekomendasi-magang" style="display:block; text-decoration:none; color:inherit; cursor:pointer; transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.10)'" onmouseout="this.style.transform=''; this.style.boxShadow=''">
            <div class="feature-icon fi-teal">
                <span class="material-icons-outlined">recommend</span>
            </div>
            <div class="feature-text">
                <h3>Rekomendasi Magang</h3>
                <p>Dapatkan saran tempat magang terbaik berdasarkan minat, nilai, dan kompetensi spesifik Anda di bidang informatika.</p>
            </div>
        </a>

        {{-- Feature 4: Riwayat Magang --}}
        <a href="{{ route('riwayat.index') }}" class="feature-card has-bg-right" id="feature-riwayat-magang" style="display:block; text-decoration:none; color:inherit; cursor:pointer; transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.10)'" onmouseout="this.style.transform=''; this.style.boxShadow=''">
            <div class="feature-icon fi-purple">
                <span class="material-icons-outlined">history</span>
            </div>
            <div class="feature-text">
                <h3>Riwayat Magang</h3>
                <p>Pantau progress kerja praktik Anda secara real-time dan simpan catatan lengkap riwayat akademik profesional Anda di satu tempat.</p>
            </div>
        </a>
    </div>
</section>

{{-- ===== CTA SECTION ===== --}}
<section class="cta-section" id="cta">
    <div class="cta-inner">
        <h2>Siap Memulai Langkah Karir Anda?</h2>
        <p>Bergabunglah dengan ribuan mahasiswa lainnya yang telah sukses menempuh magang dan tugas akhir melalui SIMAKATA.</p>
        <div class="cta-buttons">
            <a href="{{ auth()->check() ? route('dashboard') : route('login.form') }}" class="btn-cta-primary" id="btn-cta-dashboard">Dashboard Saya</a>
            @guest
                <a href="#" class="btn-cta-secondary" id="btn-cta-hubungi">Hubungi Admin</a>
            @endguest
            @auth
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit" class="btn-cta-secondary" id="btn-cta-logout">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</section>
<x-footer />

<script>
    // ===== Navbar sticky shadow =====
    const navbar = document.getElementById('mainNavbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 10);
    });

    // ===== Mobile nav toggle =====
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileNav    = document.getElementById('mobileNav');
    const mobileClose  = document.getElementById('mobileClose');

    hamburgerBtn.addEventListener('click', () => {
        mobileNav.classList.add('open');
        document.body.style.overflow = 'hidden';
    });

    function closeMobileNav() {
        mobileNav.classList.remove('open');
        document.body.style.overflow = '';
    }

    mobileClose.addEventListener('click', closeMobileNav);

    // Close when clicking a link inside mobile nav
    mobileNav.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', closeMobileNav);
    });

    // ===== Smooth scroll for anchor links =====
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ===== Scroll-triggered animation (Intersection Observer) =====
    const animEls = document.querySelectorAll('.stat-item, .feature-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    animEls.forEach(el => {
        el.style.animationPlayState = 'paused';
        observer.observe(el);
    });
</script>

</body>
</html>
