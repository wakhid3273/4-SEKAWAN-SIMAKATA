<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Input KP/Magang - SIMAKATA">
    <title>Input KP/Magang — SIMAKATA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --sidebar-w: 220px;
            --sidebar-bg: #0d1b2e;
            --sidebar-hover: rgba(255,255,255,0.06);
            --sidebar-active-bg: #1a5fb4;
            --blue-primary: #1a5fb4;
            --blue-dark: #0a3d6b;
            --blue-light: #e8f2ff;
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
        .brand-name { font-size: 17px; font-weight: 800; letter-spacing: 2px; color: #fff; }
        .brand-sub { font-size: 10px; color: rgba(255,255,255,0.38); margin-top: 3px; }

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
        .topbar-heading h1 { font-size: 18px; font-weight: 700; color: var(--text-1); }
        .topbar-heading p { font-size: 12px; color: var(--text-2); margin-top: 1px; }
        .topbar-right { display: flex; align-items: center; gap: 14px; }
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
            overflow: hidden;
        }
        .topbar-avatar img { width: 100%; height: 100%; object-fit: cover; }

        /* ===== PAGE BODY ===== */
        .page-body { flex: 1; padding: 28px 32px 40px; }

        /* ===== ALERTS ===== */
        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 13px;
        }
        .alert-error { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; }

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
            padding: 18px 28px;
            border-bottom: 1px solid #f1f3f5;
            background: #fafbfc;
        }
        .card-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            font-weight: 700;
            color: var(--text-1);
        }
        .card-title .material-icons-outlined { font-size: 22px; color: var(--blue-primary); }

        /* ===== FORM ===== */
        .form-body { padding: 28px 28px; }

        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-2);
            margin-bottom: 8px;
        }
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-size: 13px;
            font-family: inherit;
            color: var(--text-1);
            background: #fff;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--blue-primary);
            box-shadow: 0 0 0 3px rgba(26, 95, 180, 0.1);
        }
        .form-input::placeholder, .form-textarea::placeholder { color: var(--text-3); }
        .form-input.is-error, .form-select.is-error { border-color: #ef4444; }

        .field-error {
            font-size: 12px;
            color: #ef4444;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .field-error .material-icons-outlined { font-size: 14px; }

        /* ===== RADIO KEGIATAN ===== */
        .radio-group { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .radio-option { position: relative; }
        .radio-option input[type="radio"] { position: absolute; opacity: 0; width: 0; height: 0; }
        .radio-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-weight: 600;
            font-size: 13px;
            color: var(--text-2);
            background: #fff;
            cursor: pointer;
            transition: all 0.2s;
        }
        .radio-option input[type="radio"]:checked + .radio-label {
            border-color: var(--blue-primary);
            background: var(--blue-light);
            color: var(--blue-primary);
        }
        .radio-label:hover { border-color: var(--blue-primary); }
        .radio-label .material-icons-outlined { font-size: 18px; }

        /* ===== PERUSAHAAN TOGGLE ===== */
        .company-mode-tabs {
            display: flex;
            gap: 0;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 12px;
        }
        .mode-tab {
            flex: 1;
            padding: 9px 14px;
            font-size: 12px;
            font-weight: 600;
            font-family: inherit;
            border: none;
            background: #fff;
            color: var(--text-2);
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
        }
        .mode-tab.active {
            background: var(--blue-primary);
            color: #fff;
        }
        .mode-tab:first-child { border-right: 1.5px solid var(--border); }
        .company-panel { display: none; }
        .company-panel.show { display: block; }

        /* ===== DIVIDER ===== */
        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 24px 0;
        }

        /* ===== UPLOAD ===== */
        .upload-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .file-upload-box {
            border: 2px dashed var(--border);
            border-radius: 12px;
            padding: 20px 16px;
            text-align: center;
            cursor: pointer;
            background: #fafbfc;
            transition: border-color 0.2s, background 0.2s;
            display: block;
        }
        .file-upload-box:hover { border-color: var(--blue-primary); background: var(--blue-light); }
        .file-upload-box input[type="file"] { display: none; }
        .file-upload-box .material-icons-outlined { font-size: 32px; color: var(--blue-primary); margin-bottom: 8px; }
        .file-title { font-weight: 600; font-size: 13px; color: var(--text-1); margin-bottom: 4px; }
        .file-desc { font-size: 11px; color: var(--text-2); }
        .file-name { font-size: 11px; color: var(--blue-primary); font-weight: 600; margin-top: 6px; }
        .required-badge {
            display: inline-block;
            background: #fef3c7;
            color: #92400e;
            font-size: 10px;
            font-weight: 700;
            padding: 1px 6px;
            border-radius: 4px;
            margin-left: 4px;
            letter-spacing: 0.3px;
        }

        /* ===== FORM ACTIONS ===== */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 11px 24px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: all 0.2s;
        }
        .btn .material-icons-outlined { font-size: 18px; }
        .btn-primary { background: var(--blue-primary); color: #fff; }
        .btn-primary:hover { background: var(--blue-dark); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(26,95,180,0.3); }
        .btn-secondary { background: #fff; color: var(--text-1); border: 1.5px solid var(--border); }
        .btn-secondary:hover { background: #f9fafb; }

        /* ===== SECTION HEADING ===== */
        .section-heading {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-1);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .section-heading .material-icons-outlined { font-size: 18px; color: var(--blue-primary); }

        /* ===== GRID ===== */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .field-group { margin-bottom: 20px; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 900px) {
            .grid-2 { grid-template-columns: 1fr; }
            .upload-grid { grid-template-columns: 1fr; }
            .radio-group { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 768px) {
            :root { --sidebar-w: 0px; }
            .sidebar { display: none; }
            .main { margin-left: 0; }
            .topbar { padding: 0 16px; }
            .page-body { padding: 16px; }
            .form-body { padding: 20px 16px; }
            .card-header { padding: 14px 16px; }
            .form-actions { flex-direction: column; }
            .form-actions .btn { width: 100%; justify-content: center; }
        }
    </style>
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
            <a href="{{ route('landing') }}" class="nav-item" title="Ke Landing Page">
                <span class="material-icons-outlined">home</span>
                <span>Home</span>
            </a>
            <a href="{{ route('user.dashboard') }}" class="nav-item">
                <span class="material-icons-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('user.kp-magang.create') }}" class="nav-item active">
                <span class="material-icons-outlined">work_outline</span>
                <span>Input KP/Magang</span>
            </a>
            <a href="{{ route('user.tugas-akhir.create') }}" class="nav-item">
                <span class="material-icons-outlined">description</span>
                <span>Input Tugas Akhir</span>
            </a>
            <a href="{{ route('user.riwayat-aktivitas') }}" class="nav-item">
                <span class="material-icons-outlined">history</span>
                <span>Riwayat Aktivitas</span>
            </a>
            <a href="{{ route('user.profil') }}" class="nav-item">
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

        {{-- Topbar --}}
        <header class="topbar">
            <div class="topbar-heading">
                <h1>Input KP/Magang</h1>
                <p>Lengkapi data pengajuan Kerja Praktik atau Magang Anda.</p>
            </div>
            <div class="topbar-right">
                <div class="topbar-divider"></div>
                <div class="topbar-user">
                    <div>
                        <div class="topbar-user-name">{{ Auth::user()->nama_lengkap }}</div>
                        <div class="topbar-user-role">Mahasiswa</div>
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

            {{-- Error Messages --}}
            @if($errors->any())
                <div class="alert alert-error">
                    <span class="material-icons-outlined" style="font-size:18px;flex-shrink:0;">error_outline</span>
                    <div>
                        <strong>Perbaiki kesalahan berikut:</strong>
                        <ul style="margin-top:4px;padding-left:16px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    <span class="material-icons-outlined" style="font-size:18px;flex-shrink:0;">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <span class="material-icons-outlined">work_outline</span>
                        Form Pengajuan KP / Magang
                    </div>
                </div>

                <form action="{{ route('user.kp-magang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">

                        {{-- Hidden fields --}}
                        <input type="hidden" name="nama" value="{{ $user->nama_lengkap }}">
                        <input type="hidden" name="nim" value="{{ $user->nim }}">

                        {{-- ===== JENIS KEGIATAN ===== --}}
                        <div class="field-group">
                            <label class="form-label">Jenis Kegiatan <span style="color:#ef4444">*</span></label>
                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" name="kegiatan" value="Kerja Praktik" required
                                        {{ old('kegiatan', 'Kerja Praktik') === 'Kerja Praktik' ? 'checked' : '' }}>
                                    <span class="radio-label">
                                        <span class="material-icons-outlined">engineering</span>
                                        Kerja Praktik
                                    </span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="kegiatan" value="Magang"
                                        {{ old('kegiatan') === 'Magang' ? 'checked' : '' }}>
                                    <span class="radio-label">
                                        <span class="material-icons-outlined">work</span>
                                        Magang
                                    </span>
                                </label>
                            </div>
                        </div>

                        <hr class="divider">

                        {{-- ===== PERUSAHAAN ===== --}}
                        <div class="field-group">
                            <label class="form-label">Perusahaan / Instansi <span style="color:#ef4444">*</span></label>

                            <div class="company-mode-tabs">
                                <button type="button" class="mode-tab active" id="tab-pilih" onclick="switchMode('pilih')">
                                    Pilih dari Daftar
                                </button>
                                <button type="button" class="mode-tab" id="tab-manual" onclick="switchMode('manual')">
                                    Ketik Manual (Baru)
                                </button>
                            </div>

                            {{-- Panel: Pilih dari Dropdown --}}
                            <div class="company-panel show" id="panel-pilih">
                                <select name="perusahaan_id" id="perusahaan_id" class="form-select {{ $errors->has('perusahaan_id') ? 'is-error' : '' }}">
                                    <option value="">— Pilih Perusahaan —</option>
                                    @foreach($perusahaan as $p)
                                        <option value="{{ $p->id }}" {{ old('perusahaan_id') == $p->id ? 'selected' : '' }}>
                                            {{ $p->nama }} — {{ $p->lokasi }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('perusahaan_id')
                                    <div class="field-error">
                                        <span class="material-icons-outlined">warning</span>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Panel: Ketik Manual --}}
                            <div class="company-panel" id="panel-manual">
                                <div class="grid-2" style="margin-top:0">
                                    <div>
                                        <input type="text" name="perusahaan_nama_manual" id="perusahaan_nama_manual"
                                            class="form-input {{ $errors->has('perusahaan_nama_manual') ? 'is-error' : '' }}"
                                            placeholder="Nama perusahaan / instansi"
                                            value="{{ old('perusahaan_nama_manual') }}">
                                        @error('perusahaan_nama_manual')
                                            <div class="field-error">
                                                <span class="material-icons-outlined">warning</span>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" name="perusahaan_lokasi_manual" id="perusahaan_lokasi_manual"
                                            class="form-input"
                                            placeholder="Kota / lokasi perusahaan"
                                            value="{{ old('perusahaan_lokasi_manual') }}">
                                    </div>
                                </div>
                            </div>

                            @error('perusahaan')
                                <div class="field-error" style="margin-top:6px;">
                                    <span class="material-icons-outlined">warning</span>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <hr class="divider">

                        {{-- ===== DATA MAHASISWA & PERIODE ===== --}}
                        <div class="section-heading">
                            <span class="material-icons-outlined">person</span>
                            Data Mahasiswa & Periode
                        </div>

                        <div class="grid-2">
                            {{-- Nama Lengkap (readonly) --}}
                            <div class="field-group">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-input" value="{{ $user->nama_lengkap }}" readonly
                                    style="background:#f9fafb;color:var(--text-2);cursor:not-allowed;">
                            </div>

                            {{-- Bidang / Divisi --}}
                            <div class="field-group">
                                <label class="form-label">Bidang / Divisi <span style="color:#ef4444">*</span></label>
                                <input type="text" name="angkatan"
                                    class="form-input {{ $errors->has('angkatan') ? 'is-error' : '' }}"
                                    placeholder="Contoh: Product & Technology"
                                    value="{{ old('angkatan', $user->angkatan) }}" required>
                                @error('angkatan')
                                    <div class="field-error"><span class="material-icons-outlined">warning</span>{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Periode Mulai --}}
                            <div class="field-group">
                                <label class="form-label">Periode Mulai <span style="color:#ef4444">*</span></label>
                                <input type="date" name="periode"
                                    class="form-input {{ $errors->has('periode') ? 'is-error' : '' }}"
                                    value="{{ old('periode') }}" required>
                                @error('periode')
                                    <div class="field-error"><span class="material-icons-outlined">warning</span>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="divider">

                        {{-- ===== UPLOAD DOKUMEN ===== --}}
                        <div class="section-heading">
                            <span class="material-icons-outlined">upload_file</span>
                            Upload Dokumen
                        </div>

                        <div class="upload-grid">
                            {{-- CV/Resume --}}
                            <label class="file-upload-box" for="cv_file">
                                <input type="file" id="cv_file" name="cv_file" accept=".pdf" required
                                    onchange="updateFileName(this, 'cv-name')">
                                <span class="material-icons-outlined">description</span>
                                <div class="file-title">
                                    CV / Resume
                                    <span class="required-badge">Wajib</span>
                                </div>
                                <div class="file-desc">Format PDF, maks. 2MB</div>
                                <div class="file-name" id="cv-name">Belum ada file dipilih</div>
                            </label>

                            {{-- Transkrip Nilai --}}
                            <label class="file-upload-box" for="transkrip_file">
                                <input type="file" id="transkrip_file" name="transkrip_file" accept=".pdf" required
                                    onchange="updateFileName(this, 'transkrip-name')">
                                <span class="material-icons-outlined">article</span>
                                <div class="file-title">
                                    Transkrip Nilai
                                    <span class="required-badge">Wajib</span>
                                </div>
                                <div class="file-desc">Format PDF, maks. 2MB</div>
                                <div class="file-name" id="transkrip-name">Belum ada file dipilih</div>
                            </label>
                        </div>

                        @error('cv_file')
                            <div class="field-error" style="margin-top:8px;"><span class="material-icons-outlined">warning</span>{{ $message }}</div>
                        @enderror
                        @error('transkrip_file')
                            <div class="field-error" style="margin-top:4px;"><span class="material-icons-outlined">warning</span>{{ $message }}</div>
                        @enderror

                        {{-- ===== FORM ACTIONS ===== --}}
                        <div class="form-actions">
                            <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">
                                <span class="material-icons-outlined">arrow_back</span>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary" id="btn-submit">
                                <span class="material-icons-outlined">send</span>
                                Submit Pengajuan
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </main>
    </div>
</div>

<script>
// Toggle company mode
let currentMode = '{{ old("perusahaan_id") ? "pilih" : (old("perusahaan_nama_manual") ? "manual" : "pilih") }}';

function switchMode(mode) {
    currentMode = mode;

    document.getElementById('tab-pilih').classList.toggle('active', mode === 'pilih');
    document.getElementById('tab-manual').classList.toggle('active', mode === 'manual');
    document.getElementById('panel-pilih').classList.toggle('show', mode === 'pilih');
    document.getElementById('panel-manual').classList.toggle('show', mode === 'manual');

    // Clear opposite fields
    if (mode === 'pilih') {
        document.getElementById('perusahaan_nama_manual').value = '';
        document.getElementById('perusahaan_lokasi_manual').value = '';
    } else {
        document.getElementById('perusahaan_id').value = '';
    }
}

// Restore mode if there's old input
@if(old('perusahaan_nama_manual'))
    switchMode('manual');
@endif

// File name display
function updateFileName(input, elementId) {
    const el = document.getElementById(elementId);
    el.textContent = input.files[0] ? input.files[0].name : 'Belum ada file dipilih';
}

// Submit loading state
document.querySelector('form').addEventListener('submit', function() {
    const btn = document.getElementById('btn-submit');
    btn.disabled = true;
    btn.innerHTML = '<span class="material-icons-outlined" style="animation:spin 1s linear infinite">sync</span> Mengirim...';
});

// CSS spin
const style = document.createElement('style');
style.textContent = '@keyframes spin { to { transform: rotate(360deg); } }';
document.head.appendChild(style);
</script>
</body>
</html>
