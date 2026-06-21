<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Input KP/Magang - SIMAKATA">
    <title>Input KP/Magang — SIMAKATA</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <style>
        /* ===== RESET & BASE ===== */
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

        /* ===== LAYOUT SHELL ===== */
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

        /* ===== MAIN CONTENT ===== */
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
        .page-body { flex: 1; padding: 28px 32px 32px; }

        /* ===== CARD ===== */
        .card {
            background: var(--card-bg);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        /* ===== FORM STYLES ===== */
        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-2);
            margin-bottom: 8px;
        }
        .form-input, .form-select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 13px;
            font-family: inherit;
            color: var(--text-1);
            background: #fff;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: var(--blue-primary);
            box-shadow: 0 0 0 3px rgba(26, 95, 180, 0.1);
        }
        .form-input::placeholder {
            color: var(--text-3);
        }

        /* Radio Button Custom Style */
        .radio-option {
            position: relative;
        }
        .radio-option input[type="radio"] {
            position: absolute;
            opacity: 0;
        }
        .radio-label {
            display: block;
            padding: 12px 24px;
            border: 2px solid var(--border);
            border-radius: 10px;
            text-align: center;
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
        .radio-label:hover {
            border-color: var(--blue-primary);
        }

        /* File Upload Box */
        .file-upload-box {
            border: 2px dashed var(--border);
            border-radius: 12px;
            padding: 24px 16px;
            text-align: center;
            transition: border-color 0.2s;
            cursor: pointer;
            background: #fafbfc;
        }
        .file-upload-box:hover {
            border-color: var(--blue-primary);
            background: #fff;
        }
        .file-upload-box input[type="file"] {
            display: none;
        }
        .file-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 12px;
            color: var(--blue-primary);
        }
        .file-title {
            font-weight: 600;
            font-size: 13px;
            color: var(--text-1);
            margin-bottom: 4px;
        }
        .file-desc {
            font-size: 11px;
            color: var(--text-2);
            margin-bottom: 8px;
        }
        .file-link {
            color: var(--blue-primary);
            font-size: 12px;
            font-weight: 600;
        }

        /* Progress Steps */
        .progress-steps {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
        }
        .step-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .step-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            flex-shrink: 0;
        }
        .step-circle.active {
            background: var(--blue-primary);
            color: #fff;
        }
        .step-circle.inactive {
            background: #e5e7eb;
            color: var(--text-3);
        }
        .step-label {
            font-weight: 600;
            font-size: 13px;
        }
        .step-label.active { color: var(--text-1); }
        .step-label.inactive { color: var(--text-3); }
        .step-line {
            flex: 1;
            height: 2px;
            background: var(--border);
            margin: 0 16px;
        }

        /* Info Box */
        .info-box {
            background: var(--blue-light);
            border: 1px solid rgba(26, 95, 180, 0.2);
            border-radius: 12px;
            padding: 16px;
            display: flex;
            gap: 14px;
            margin-bottom: 28px;
        }
        .info-icon {
            width: 24px;
            height: 24px;
            color: var(--blue-primary);
            flex-shrink: 0;
        }
        .info-content h3 {
            font-weight: 700;
            font-size: 13px;
            color: var(--blue-dark);
            margin-bottom: 6px;
        }
        .info-content p {
            font-size: 12px;
            color: var(--blue-dark);
            line-height: 1.6;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
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
        .btn-primary {
            background: var(--blue-primary);
            color: #fff;
        }
        .btn-primary:hover {
            background: var(--blue-dark);
        }
        .btn-secondary {
            background: #fff;
            color: var(--text-1);
            border: 1px solid var(--border);
        }
        .btn-secondary:hover {
            background: #f9fafb;
        }
        .btn .material-icons-outlined {
            font-size: 18px;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 28px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            :root { --sidebar-w: 0px; }
            .sidebar { display: none; }
            .main { margin-left: 0; }
            .topbar { padding: 0 16px; }
            .topbar-heading h1 { font-size: 15px; }
            .page-body { padding: 16px; }
            .progress-steps { flex-direction: column; align-items: stretch; }
            .step-line { display: none; }
            .form-actions { flex-direction: column; gap: 12px; }
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
            <a href="{{ route('judul-ta.index') }}" class="nav-item">
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
                <p>Lengkapi data untuk pengajuan Kerja Praktik atau Magang Anda.</p>
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
            <div style="max-width: 960px;">
                
                {{-- Progress Steps --}}
                <div class="progress-steps">
                    <div class="step-item">
                        <div class="step-circle active">1</div>
                        <div class="step-label active">Pengajuan</div>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item">
                        <div class="step-circle inactive">2</div>
                        <div class="step-label inactive">Dokumen</div>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item">
                        <div class="step-circle inactive">3</div>
                        <div class="step-label inactive">Konfirmasi</div>
                    </div>
                </div>

                {{-- Info Box --}}
                <div class="info-box">
                    <span class="material-icons-outlined info-icon">info</span>
                    <div class="info-content">
                        <h3>Petunjuk Pengisian</h3>
                        <p>Pastikan nama pengajuan sesuai dengan data terdaftar. Unggah dokumen dalam format PDF dengan ukuran maksimal 2MB per file.</p>
                    </div>
                </div>

                {{-- Form Card --}}
                <div class="card">
                    <form action="{{ route('user.kp-magang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div style="padding: 28px 32px;">
                            
                            {{-- Jenis Kegiatan --}}
                            <div style="margin-bottom: 24px;">
                                <label class="form-label">Jenis Kegiatan *</label>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                                    <label class="radio-option">
                                        <input type="radio" name="kegiatan" value="Kerja Praktik" required checked>
                                        <span class="radio-label">Kerja Praktik</span>
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" name="kegiatan" value="Magang" required>
                                        <span class="radio-label">Magang</span>
                                    </label>
                                </div>
                            </div>

                            {{-- Nama Perusahaan --}}
                            <div style="margin-bottom: 24px;">
                                <label class="form-label">Nama Perusahaan *</label>
                                <select name="perusahaan_id" required class="form-select">
                                    <option value="">Pilih Perusahaan dan Lokasi</option>
                                    @foreach($perusahaan as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }} - {{ $p->lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Grid 2 Columns --}}
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px;">
                                
                                {{-- NIM --}}
                                <div>
                                    <label class="form-label">NIM / NISN *</label>
                                    <input type="text" name="nim" value="{{ $user->nim }}" required class="form-input" placeholder="Contoh: E020180001">
                                </div>

                                {{-- Bidang/Divisi --}}
                                <div>
                                    <label class="form-label">Bidang / Divisi *</label>
                                    <input type="text" name="angkatan" value="{{ $user->angkatan }}" required class="form-input" placeholder="Contoh: Product & Technology">
                                </div>

                                {{-- Periode Memulai --}}
                                <div>
                                    <label class="form-label">Periode Memulai *</label>
                                    <input type="date" name="periode" required class="form-input">
                                </div>

                                {{-- Periode Selesai --}}
                                <div>
                                    <label class="form-label">Selesai *</label>
                                    <input type="date" required class="form-input">
                                </div>
                            </div>

                            {{-- Hidden Field --}}
                            <input type="hidden" name="nama" value="{{ $user->nama_lengkap }}">

                            {{-- Divider --}}
                            <div style="border-top: 1px solid var(--border); margin: 32px 0;"></div>

                            {{-- Upload Dokumen --}}
                            <h3 style="font-size: 15px; font-weight: 700; color: var(--text-1); margin-bottom: 20px;">Upload Dokumen Pendukung</h3>
                            
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px;">
                                
                                {{-- CV/Resume --}}
                                <label class="file-upload-box">
                                    <input type="file" name="cv_file" accept=".pdf" required onchange="updateFileName(this, 'cv-name')">
                                    <span class="material-icons-outlined file-icon">description</span>
                                    <div class="file-title">CV/Resume</div>
                                    <div class="file-desc" id="cv-name">File: PDF, Max 2MB</div>
                                    <span class="file-link">Upload File</span>
                                </label>

                                {{-- Transkrip Nilai --}}
                                <label class="file-upload-box">
                                    <input type="file" name="transkrip_file" accept=".pdf" required onchange="updateFileName(this, 'transkrip-name')">
                                    <span class="material-icons-outlined file-icon">article</span>
                                    <div class="file-title">Transkrip Nilai</div>
                                    <div class="file-desc" id="transkrip-name">File: PDF, Max 2MB</div>
                                    <span class="file-link">Upload File</span>
                                </label>

                                {{-- Portofolio/Sertifikat --}}
                                <label class="file-upload-box">
                                    <input type="file" name="portofolio_file" accept=".pdf" onchange="updateFileName(this, 'porto-name')">
                                    <span class="material-icons-outlined file-icon">folder_open</span>
                                    <div class="file-title">Portofolio/Sertifikat</div>
                                    <div class="file-desc" id="porto-name">File: PDF, Max 2MB</div>
                                    <span class="file-link">Upload File</span>
                                </label>
                            </div>

                            {{-- Form Actions --}}
                            <div class="form-actions">
                                <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Simpan Draft</a>
                                <button type="submit" class="btn btn-primary">
                                    Lanjutkan
                                    <span class="material-icons-outlined">arrow_forward</span>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </main>

    </div>
</div>

<script>
function updateFileName(input, elementId) {
    const fileName = input.files[0]?.name || 'File: PDF, Max 2MB';
    document.getElementById(elementId).textContent = fileName;
}
</script>
</body>
</html>
