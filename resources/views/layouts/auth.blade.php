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
            align-items: center;
            justify-content: center;
            background: #f0f4f8;
            position: relative;
            overflow: hidden;
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
            box-shadow:
                0 4px 6px -1px rgba(0,0,0,0.05),
                0 25px 50px -12px rgba(0,0,0,0.12),
                0 0 0 1px rgba(0,0,0,0.03);
            animation: card-entrance 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes card-entrance {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.97);
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
            animation: float-illustration 5s ease-in-out infinite;
        }

        @keyframes float-illustration {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
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
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            font-size: 20px;
            padding: 4px;
            display: flex;
            align-items: center;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: #6b7280;
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
            justify-content: center;
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
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            color: #9ca3af;
            white-space: nowrap;
            z-index: 1;
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
                align-items: flex-start;
                padding-top: 40px;
            }

            .auth-card {
                flex-direction: column;
                min-height: auto;
                border-radius: 20px;
            }

            .auth-brand {
                width: 100%;
                min-width: unset;
                padding: 32px 24px;
                min-height: 240px;
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
                position: relative;
                bottom: auto;
                left: auto;
                transform: none;
                text-align: center;
                margin-top: 24px;
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
    </style>
</head>
<body>
    @yield('content')

    <footer class="auth-footer">
        &copy; 2024 HMIF Informatics SIMAKATA. Managed by Informatics Department.
    </footer>

    @yield('scripts')
</body>
</html>
