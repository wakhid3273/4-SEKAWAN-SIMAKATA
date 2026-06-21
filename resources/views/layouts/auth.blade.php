<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIMAKATA - Sistem Informasi Mahasiswa Kerja Praktek dan Tugas Akhir">
    <title>@yield('title', 'SIMAKATA')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        /* ===== RESET & BASE ===== */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #f0f4f8;
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
        }

        /* ===== DECORATIVE BACKGROUND ===== */
        body::before {
            content: '';
            position: fixed;
            top: -120px;
            left: -120px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, transparent 70%);
            z-index: 0;
            animation: float-bg 8s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -100px;
            right: -60px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(251,191,36,0.18) 0%, transparent 70%);
            z-index: 0;
            animation: float-bg2 10s ease-in-out infinite;
        }

        @keyframes float-bg {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(30px, 20px); }
        }

        @keyframes float-bg2 {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-20px, -30px); }
        }

        /* ===== MAIN CARD ===== */
        .auth-card {
            position: relative;
            z-index: 1;
            display: flex;
            width: 960px;
            max-width: 95vw;
            min-height: 580px;
            border-radius: 24px;
            overflow: hidden;
            background: #ffffff;
            
            /* ENHANCED CARD ELEVATION - Premium Depth */
            box-shadow:
                0 0 0 1px rgba(0,0,0,0.02),
                0 1px 2px -1px rgba(0,0,0,0.04),
                0 4px 8px -2px rgba(0,0,0,0.06),
                0 12px 24px -4px rgba(0,0,0,0.08),
                0 24px 48px -8px rgba(0,0,0,0.12);
            
            /* Subtle border for depth */
            border: 1px solid rgba(0,0,0,0.04);
            
            /* Initial entrance animation - slower and more elegant */
            animation: card-entrance-premium 1.1s cubic-bezier(0.16, 1, 0.3, 1);
            
            /* For smooth swap transitions */
            transition: box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .auth-card:hover {
            box-shadow:
                0 0 0 1px rgba(0,0,0,0.03),
                0 2px 4px -1px rgba(0,0,0,0.05),
                0 8px 16px -4px rgba(0,0,0,0.08),
                0 16px 32px -6px rgba(0,0,0,0.12),
                0 32px 64px -12px rgba(0,0,0,0.16);
        }

        @keyframes card-entrance-premium {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ===== LEFT PANEL (BRANDING) ===== */
        .auth-brand {
            position: relative;
            width: 440px;
            min-width: 440px;
            background: linear-gradient(160deg, #0a3d6b 0%, #0d4f8a 30%, #1167a8 60%, #0d4f8a 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 40px;
            overflow: hidden;
            
            /* Initial animation - slower fade + slide from left */
            animation: panel-slide-left-premium 1.2s cubic-bezier(0.16, 1, 0.3, 1) 0.1s both;
            
            /* For swap animation */
            transition: all 0.8s cubic-bezier(0.65, 0, 0.35, 1);
            transform-origin: center center;
        }

        /* Decorative circles in the brand panel */
        .auth-brand::before {
            content: '';
            position: absolute;
            top: 30px;
            left: 30px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid rgba(255,255,255,0.12);
            animation: pulse-ring 4s ease-in-out infinite;
        }

        .auth-brand::after {
            content: '';
            position: absolute;
            bottom: 80px;
            right: -20px;
            width: 120px;
            height: 120px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
        }

        @keyframes pulse-ring {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.15); opacity: 0.15; }
        }

        /* Diamond decorative element */
        .brand-diamond {
            position: absolute;
            bottom: 45%;
            right: -8px;
            width: 30px;
            height: 30px;
            background: rgba(255,255,255,0.08);
            transform: rotate(45deg);
        }

        .brand-illustration {
            width: 280px;
            height: auto;
            margin-bottom: 32px;
            filter: drop-shadow(0 10px 30px rgba(0,0,0,0.3));
            
            /* ENHANCED floating - slower and more subtle */
            animation: float-illustration-premium 10s ease-in-out infinite;
            
            /* Smooth hover interaction */
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .brand-illustration:hover {
            animation-play-state: paused;
            transform: scale(1.02) translateY(-5px);
        }

        @keyframes float-illustration-premium {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .brand-title {
            color: #ffffff;
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 3px;
            margin-bottom: 14px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .brand-subtitle {
            color: rgba(255,255,255,0.75);
            font-size: 14px;
            line-height: 1.7;
            text-align: center;
            max-width: 320px;
        }

        /* ===== RIGHT PANEL (FORM) ===== */
        .auth-form-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 52px;
            position: relative;
            background: linear-gradient(180deg, #ffffff 60%, #fffdf5 100%);
            
            /* Initial animation - slower fade + slide from right */
            animation: panel-slide-right-premium 1.3s cubic-bezier(0.16, 1, 0.3, 1) 0.2s both;
            
            /* For swap animation */
            transition: all 0.8s cubic-bezier(0.65, 0, 0.35, 1);
            transform-origin: center center;
        }

        .auth-form-panel h1 {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .auth-form-panel .subtitle {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 32px;
            line-height: 1.6;
        }

        /* ===== FORM ELEMENTS ===== */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 11px;
            font-weight: 600;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
        }

        .form-label a {
            font-size: 12px;
            font-weight: 500;
            color: #2563eb;
            text-decoration: none;
            text-transform: none;
            letter-spacing: 0;
            transition: color 0.2s;
        }

        .form-label a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            color: #9ca3af;
            font-size: 20px;
            pointer-events: none;
            transition: color 0.2s;
            display: block; /* Ensure icon is visible */
        }

        .input-wrapper input {
            width: 100%;
            padding: 14px 48px 14px 48px;
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            font-size: 14px;
            font-family: inherit;
            color: #111827;
            background: #ffffff;
            transition: all 0.25s ease;
            outline: none;
        }

        .input-wrapper input::placeholder {
            color: #9ca3af;
        }

        .input-wrapper input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }

        .input-wrapper input:focus ~ .input-icon,
        .input-wrapper input:focus + .input-icon {
            color: #2563eb;
        }

        /* For the icon before input */
        .input-wrapper:focus-within .input-icon {
            color: #2563eb;
        }

        .toggle-password {
            display: none; /* Hide duplicate toggle icon - already in design */
        }

        /* ===== REMEMBER ME ===== */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            margin-top: 4px;
        }

        .remember-row input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border: 1.5px solid #d1d5db;
            border-radius: 4px;
            accent-color: #2563eb;
            cursor: pointer;
        }

        .remember-row label {
            font-size: 13px;
            color: #6b7280;
            cursor: pointer;
            user-select: none;
        }

        /* ===== SUBMIT BUTTON ===== */
        .btn-submit {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #1e5fa8 0%, #1a4f8f 50%, #164078 100%);
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.3px;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: left 0.5s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #1a4f8f 0%, #164078 50%, #0f3060 100%);
            box-shadow: 0 8px 25px -5px rgba(30,95,168,0.4);
            transform: translateY(-1px);
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* ===== LINKS & FOOTER ===== */
        .auth-switch {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
            color: #6b7280;
        }

        .auth-switch a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        .auth-switch a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        .auth-help {
            display: flex;
            align-items: center;
            justify-content: center; /* Center the help link */
            gap: 24px;
            margin-top: 20px;
        }

        .auth-help a {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #6b7280;
            text-decoration: none;
            transition: color 0.2s;
        }

        .auth-help a:hover {
            color: #374151;
        }

        .auth-help .material-icons-outlined {
            font-size: 16px;
        }

        /* ===== FOOTER ===== */
        .auth-footer {
            margin-top: 24px;
            font-size: 12px;
            color: #9ca3af;
            text-align: center;
            z-index: 1;
            padding-bottom: 20px;
        }

        /* ===== ALERTS ===== */
        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: alert-in 0.3s ease;
        }

        @keyframes alert-in {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .error-text {
            font-size: 12px;
            color: #dc2626;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            body {
                padding: 16px;
                padding-top: 24px;
                justify-content: flex-start;
            }

            .auth-card {
                flex-direction: column;
                min-height: auto;
                border-radius: 20px;
                width: 100%;
            }

            .auth-brand {
                width: 100%;
                min-width: unset;
                padding: 32px 24px;
                min-height: auto;
            }

            .brand-illustration {
                width: 180px;
                margin-bottom: 20px;
            }

            .brand-title {
                font-size: 24px;
            }

            .brand-subtitle {
                font-size: 12px;
            }

            .auth-form-panel {
                padding: 32px 24px;
            }

            .auth-form-panel h1 {
                font-size: 22px;
            }

            .auth-footer {
                margin-top: 16px;
                padding-bottom: 16px;
            }
        }

        @media (max-width: 480px) {
            .auth-form-panel {
                padding: 24px 20px;
            }

            .input-wrapper input {
                padding: 12px 44px 12px 44px;
                font-size: 13px;
            }

            .btn-submit {
                padding: 13px;
                font-size: 14px;
            }
        }

        /* ============================================
           PREMIUM ANIMATIONS & MICRO-INTERACTIONS
           ============================================ */

        /* ========== EXIT ANIMATION FOR PAGE TRANSITIONS ========== */
        
        /* When user clicks to navigate between Login/Register */
        .auth-card.exiting {
            animation: card-exit 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            pointer-events: none;
        }

        @keyframes card-exit {
            to {
                opacity: 0;
                transform: translateY(-20px) scale(0.96);
            }
        }

        /* ========== PAGE LOAD ANIMATIONS ========== */

        /* Panel entrance - slower and more elegant */
        @keyframes panel-slide-left-premium {
            from {
                opacity: 0;
                transform: translateX(-60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes panel-slide-right-premium {
            from {
                opacity: 0;
                transform: translateX(60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .auth-card {
            animation: card-entrance 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .auth-brand {
            animation: panel-slide-left 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.1s both;
        }

        .auth-form-panel {
            animation: panel-slide-right 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.2s both;
        }

        .auth-form-panel h1 {
            animation: fade-slide-up 0.5s cubic-bezier(0.16, 1, 0.3, 1) 0.3s both;
        }

        .auth-form-panel .subtitle {
            animation: fade-slide-up 0.5s cubic-bezier(0.16, 1, 0.3, 1) 0.4s both;
        }

        .form-group {
            animation: fade-slide-up 0.4s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .form-group:nth-child(1) { animation-delay: 0.5s; }
        .form-group:nth-child(2) { animation-delay: 0.55s; }
        .form-group:nth-child(3) { animation-delay: 0.6s; }
        .form-group:nth-child(4) { animation-delay: 0.65s; }

        .btn-submit {
            animation: fade-slide-up 0.4s cubic-bezier(0.16, 1, 0.3, 1) 0.7s both;
        }

        .auth-switch {
            animation: fade-in 0.5s ease 0.8s both;
        }

        .auth-help {
            animation: fade-in 0.5s ease 0.9s both;
        }

        @keyframes panel-slide-left {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes panel-slide-right {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fade-slide-up {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Subtle Parallax (applied via JavaScript) */
        .parallax-enabled .auth-brand {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform;
        }

        .parallax-enabled .brand-illustration {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform;
        }

        .parallax-enabled .brand-diamond {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform;
        }

        /* Enhanced Button Hover - More Premium */
        .btn-submit {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, box-shadow;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 0 0 1px rgba(30,95,168,0.1),
                0 8px 16px -4px rgba(30,95,168,0.3),
                0 20px 40px -8px rgba(30,95,168,0.25);
        }

        .btn-submit:active {
            transform: translateY(0) scale(0.98);
            transition: all 0.15s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Loading State */
        .btn-submit.loading {
            pointer-events: none;
            opacity: 0.7;
            position: relative;
        }

        .btn-submit.loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            top: 50%;
            left: 50%;
            margin-left: -8px;
            margin-top: -8px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spinner 0.6s linear infinite;
        }

        @keyframes spinner {
            to { transform: rotate(360deg); }
        }

        /* Enhanced Input Focus - More Professional */
        .input-wrapper input {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: border-color, box-shadow, transform;
        }

        .input-wrapper input:focus {
            transform: translateY(-1px);
            box-shadow: 
                0 0 0 3px rgba(37,99,235,0.08),
                0 2px 8px -2px rgba(37,99,235,0.15);
        }

        .input-icon {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Toggle Password Animation */
        .toggle-password {
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .toggle-password:hover {
            transform: scale(1.1);
        }

        .toggle-password:active {
            transform: scale(0.95);
        }

        /* Illustration Floating */
        .brand-illustration {
            animation: float-illustration 6s ease-in-out infinite;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .brand-illustration:hover {
            animation-play-state: paused;
            transform: scale(1.02) translateY(-5px);
        }

        @keyframes float-illustration {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }

        /* Decorative Elements Floating - SLOWER & MORE SUBTLE */
        body::before {
            animation: float-bg-premium 14s ease-in-out infinite;
        }

        body::after {
            animation: float-bg2-premium 18s ease-in-out infinite;
        }

        @keyframes float-bg-premium {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(12px, 8px); }
            50% { transform: translate(22px, 18px); }
            75% { transform: translate(10px, 25px); }
        }

        @keyframes float-bg2-premium {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(-8px, -12px); }
            50% { transform: translate(-18px, -22px); }
            75% { transform: translate(-10px, -16px); }
        }

        .auth-brand::before {
            animation: pulse-ring-premium 8s ease-in-out infinite;
        }

        @keyframes pulse-ring-premium {
            0%, 100% { 
                transform: scale(1); 
                opacity: 0.25; 
            }
            50% { 
                transform: scale(1.15); 
                opacity: 0.08; 
            }
        }

        .auth-brand::after {
            animation: float-circle-premium 12s ease-in-out infinite;
        }

        @keyframes float-circle-premium {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-12px, 12px) scale(1.08); }
        }

        .brand-diamond {
            animation: rotate-diamond-premium 20s linear infinite;
        }

        @keyframes rotate-diamond-premium {
            from { transform: rotate(45deg); }
            to { transform: rotate(405deg); }
        }

        /* Link Hover Enhancement */
        .form-label a,
        .auth-switch a,
        .auth-help a {
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }

        .form-label a:hover,
        .auth-switch a:hover,
        .auth-help a:hover {
            transform: translateY(-1px);
        }

        /* Alert Smooth Entrance */
        .alert {
            animation: alert-in 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes alert-in {
            from { 
                opacity: 0; 
                transform: translateY(-10px) scale(0.97); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }

        /* Form Button Shine Effect on Hover */
        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s ease;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        /* Performance Optimization */
        .auth-card,
        .auth-brand,
        .auth-form-panel,
        .brand-illustration,
        .btn-submit,
        .input-wrapper input {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Reduce motion for accessibility */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }

            .brand-illustration,
            body::before,
            body::after,
            .auth-brand::before,
            .auth-brand::after,
            .brand-diamond {
                animation: none !important;
            }
        }
    </style>
</head>
<body>
    @yield('content')

    <footer class="auth-footer">
        &copy; 2024 HMIF Informatics SIMAKATA. Managed by Informatics Department.
    </footer>

    <!-- Premium Animation Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const authCard = document.querySelector('.auth-card');
            const authBrand = document.querySelector('.auth-brand');
            const illustration = document.querySelector('.brand-illustration');
            const diamond = document.querySelector('.brand-diamond');
            
            // ========== EXIT ANIMATION FOR PAGE NAVIGATION ==========
            function initExitAnimation() {
                // Find all navigation links (Login ↔ Register)
                const navLinks = document.querySelectorAll('.auth-switch a');
                
                navLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        // Check if it's an internal navigation
                        const href = this.getAttribute('href');
                        if (href && href.startsWith('/') && !e.ctrlKey && !e.metaKey) {
                            e.preventDefault();
                            
                            // Add exit animation class
                            authCard.classList.add('exiting');
                            
                            // Navigate after animation completes
                            setTimeout(() => {
                                window.location.href = href;
                            }, 600);
                        }
                    });
                });
            }
            
            initExitAnimation();
            
            // ========== SUBTLE PARALLAX ==========
            // Check if user prefers reduced motion
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            
            if (!prefersReducedMotion && authCard && window.innerWidth > 768) {
                document.body.classList.add('parallax-enabled');
                
                authCard.addEventListener('mousemove', function(e) {
                    const rect = authCard.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const percentX = (x - centerX) / centerX;
                    const percentY = (y - centerY) / centerY;
                    
                    const maxMove = 8;
                    
                    if (illustration) {
                        const moveX = percentX * maxMove;
                        const moveY = percentY * maxMove;
                        illustration.style.transform = `translateY(${moveY}px) translateX(${moveX}px)`;
                    }
                    
                    if (diamond) {
                        const moveX = percentX * (maxMove * 0.5);
                        const moveY = percentY * (maxMove * 0.5);
                        diamond.style.transform = `rotate(45deg) translateY(${-moveY}px) translateX(${-moveX}px)`;
                    }
                });
                
                authCard.addEventListener('mouseleave', function() {
                    if (illustration) {
                        illustration.style.transform = '';
                    }
                    if (diamond) {
                        diamond.style.transform = '';
                    }
                });
            }
            
            // ========== BUTTON LOADING STATE ==========
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const submitBtn = form.querySelector('.btn-submit');
                    if (submitBtn && !submitBtn.classList.contains('loading')) {
                        submitBtn.classList.add('loading');
                        const originalText = submitBtn.textContent;
                        submitBtn.textContent = '';
                        
                        // Remove loading after 10s as fallback
                        setTimeout(() => {
                            submitBtn.classList.remove('loading');
                            submitBtn.textContent = originalText;
                        }, 10000);
                    }
                });
            });
        });
    </script>

    @yield('scripts')
</body>
</html>