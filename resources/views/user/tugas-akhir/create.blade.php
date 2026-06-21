<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Input Judul Tugas Akhir - SIMAKATA">
    <title>Input Tugas Akhir — SIMAKATA</title>

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

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-w); min-width: var(--sidebar-w);
            background: var(--sidebar-bg);
            display: flex; flex-direction: column;
            position: fixed; top: 0; left: 0;
            height: 100vh; z-index: 100;
            overflow-y: auto; scrollbar-width: none;
        }
        .sidebar::-webkit-scrollbar { display: none; }
        .sidebar-brand { padding: 24px 22px 18px; border-bottom: 1px solid rgba(255,255,255,0.06); }
        .brand-name { font-size: 17px; font-weight: 800; letter-spacing: 2px; color: #fff; }
        .brand-sub { font-size: 10px; color: rgba(255,255,255,0.38); margin-top: 3px; }
        .sidebar-nav { flex: 1; padding: 14px 12px; display: flex; flex-direction: column; gap: 2px; }
        .nav-item {
            display: flex; align-items: center; gap: 11px;
            padding: 10px 12px; border-radius: 10px;
            color: rgba(255,255,255,0.58); text-decoration: none;
            font-size: 13px; font-weight: 500;
            transition: background 0.18s, color 0.18s;
        }
        .nav-item .material-icons-outlined { font-size: 20px; flex-shrink: 0; }
        .nav-item:hover { background: var(--sidebar-hover); color: rgba(255,255,255,0.9); }
        .nav-item.active { background: var(--sidebar-active-bg); color: #fff; font-weight: 600; }
        .sidebar-footer { padding: 14px 12px 18px; border-top: 1px solid rgba(255,255,255,0.06); }
        .btn-logout {
            display: flex; align-items: center; gap: 11px; width: 100%;
            padding: 10px 12px; border-radius: 10px; background: none; border: none;
            color: rgba(255,255,255,0.45); font-size: 13px; font-weight: 500;
            font-family: inherit; cursor: pointer;
            transition: background 0.18s, color 0.18s; text-align: left;
        }
        .btn-logout .material-icons-outlined { font-size: 20px; }
        .btn-logout:hover { background: rgba(239,68,68,0.12); color: #f87171; }

        /* MAIN */
        .main { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }

        /* TOPBAR */
        .topbar {
            background: #fff; border-bottom: 1px solid var(--border);
            padding: 0 32px; height: 60px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 50; gap: 16px;
        }
        .topbar-heading h1 { font-size: 18px; font-weight: 700; color: var(--text-1); }
        .topbar-heading p { font-size: 12px; color: var(--text-2); margin-top: 1px; }
        .topbar-right { display: flex; align-items: center; gap: 14px; }
        .topbar-divider { width: 1px; height: 28px; background: var(--border); }
        .topbar-user { display: flex; align-items: center; gap: 10px; }
        .topbar-user-name { font-size: 13px; font-weight: 600; color: var(--text-1); text-align: right; }
        .topbar-user-role { font-size: 11px; color: var(--text-2); text-align: right; }
        .topbar-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: linear-gradient(135deg, #4a6fa5, #1a5fb4);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 14px; font-weight: 700; flex-shrink: 0; overflow: hidden;
        }
        .topbar-avatar img { width: 100%; height: 100%; object-fit: cover; }

        /* PAGE */
        .page-body { flex: 1; padding: 28px 32px 40px; }

        /* ALERTS */
        .alert {
            padding: 12px 16px; border-radius: 10px; margin-bottom: 20px;
            display: flex; align-items: flex-start; gap: 10px; font-size: 13px;
        }
        .alert-error { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; }

        /* CARD */
        .card {
            background: var(--card-bg); border-radius: var(--radius);
            border: 1px solid var(--border); box-shadow: var(--shadow-sm); overflow: hidden;
        }
        .card-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 18px 28px; border-bottom: 1px solid #f1f3f5; background: #fafbfc;
        }
        .card-title {
            display: flex; align-items: center; gap: 8px;
            font-size: 15px; font-weight: 700; color: var(--text-1);
        }
        .card-title .material-icons-outlined { font-size: 22px; color: var(--blue-primary); }

        /* FORM */
        .form-body { padding: 32px 28px; max-width: 720px; }

        .form-label {
            display: block; font-size: 11px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.8px;
            color: var(--text-2); margin-bottom: 8px;
        }
        .form-textarea {
            width: 100%; padding: 12px 14px;
            border: 1.5px solid var(--border); border-radius: 10px;
            font-size: 14px; font-family: inherit; color: var(--text-1);
            background: #fff; transition: border-color 0.2s, box-shadow 0.2s;
            resize: vertical; min-height: 120px; line-height: 1.6;
        }
        .form-textarea:focus {
            outline: none; border-color: var(--blue-primary);
            box-shadow: 0 0 0 3px rgba(26, 95, 180, 0.1);
        }
        .form-textarea::placeholder { color: var(--text-3); }
        .form-textarea.is-error { border-color: #ef4444; }
        .char-count { font-size: 11px; color: var(--text-3); text-align: right; margin-top: 5px; }

        .field-error { font-size: 12px; color: #ef4444; margin-top: 5px; display: flex; align-items: center; gap: 4px; }
        .field-error .material-icons-outlined { font-size: 14px; }

        /* HINT BOX */
        .hint-box {
            background: var(--blue-light); border: 1px solid rgba(26,95,180,0.2);
            border-radius: 12px; padding: 16px 18px;
            display: flex; gap: 12px; margin-bottom: 24px;
        }
        .hint-box .material-icons-outlined { font-size: 20px; color: var(--blue-primary); flex-shrink: 0; margin-top: 1px; }
        .hint-box p { font-size: 13px; color: var(--blue-dark); line-height: 1.6; }

        /* FORM ACTIONS */
        .form-actions {
            display: flex; justify-content: flex-end; align-items: center;
            gap: 12px; margin-top: 28px; padding-top: 20px;
            border-top: 1px solid var(--border);
        }
        .btn {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 11px 24px; border-radius: 10px; font-size: 13px;
            font-weight: 600; font-family: inherit; cursor: pointer;
            text-decoration: none; border: none; transition: all 0.2s;
        }
        .btn .material-icons-outlined { font-size: 18px; }
        .btn-primary { background: var(--blue-primary); color: #fff; }
        .btn-primary:hover { background: var(--blue-dark); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(26,95,180,0.3); }
        .btn-secondary { background: #fff; color: var(--text-1); border: 1.5px solid var(--border); }
        .btn-secondary:hover { background: #f9fafb; }

        @media (max-width: 768px) {
            :root { --sidebar-w: 0px; }
            .sidebar { display: none; }
            .main { margin-left: 0; }
            .topbar { padding: 0 16px; }
            .page-body { padding: 16px; }
            .form-body { padding: 20px 16px; }
            .form-actions { flex-direction: column; }
            .form-actions .btn { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>
<div class="shell">

    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-name">SIMAKATA</div>
            <div class="brand-sub">Academic Management</div>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('landing') }}" class="nav-item">
                <span class="material-icons-outlined">home</span>
                <span>Home</span>
            </a>
            <a href="{{ route('user.dashboard') }}" class="nav-item">
                <span class="material-icons-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('user.kp-magang.create') }}" class="nav-item">
                <span class="material-icons-outlined">work_outline</span>
                <span>Input KP/Magang</span>
            </a>
            <a href="{{ route('user.tugas-akhir.create') }}" class="nav-item active">
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
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" class="btn-logout">
                    <span class="material-icons-outlined">logout</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <div class="main">
        <header class="topbar">
            <div class="topbar-heading">
                <h1>Input Tugas Akhir</h1>
                <p>Ajukan judul Tugas Akhir Anda untuk diverifikasi oleh admin.</p>
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

        <main class="page-body">

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
                        <span class="material-icons-outlined">description</span>
                        Form Pengajuan Judul Tugas Akhir
                    </div>
                </div>

                <form action="{{ route('user.tugas-akhir.store') }}" method="POST" id="form-ta">
                    @csrf
                    <div class="form-body">

                        <div class="hint-box">
                            <span class="material-icons-outlined">lightbulb</span>
                            <p>Tulis judul Tugas Akhir secara lengkap dan jelas. Judul yang disetujui akan tampil di halaman <strong>Judul TA</strong> publik. Setelah disetujui, Anda dapat mengajukan kembali jika ingin mengubah judul.</p>
                        </div>

                        <div style="margin-bottom: 4px;">
                            <label class="form-label" for="title">
                                Judul Tugas Akhir <span style="color:#ef4444">*</span>
                            </label>
                            <textarea
                                id="title"
                                name="title"
                                class="form-textarea {{ $errors->has('title') ? 'is-error' : '' }}"
                                placeholder="Contoh: Implementasi Machine Learning untuk Prediksi Cuaca Berbasis Data Satelit di Wilayah Jawa Barat"
                                maxlength="500"
                                required
                                oninput="updateCharCount(this)"
                            >{{ old('title') }}</textarea>
                            <div class="char-count">
                                <span id="char-count">{{ strlen(old('title', '')) }}</span> / 500 karakter
                            </div>
                            @error('title')
                                <div class="field-error">
                                    <span class="material-icons-outlined">warning</span>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">
                                <span class="material-icons-outlined">arrow_back</span>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary" id="btn-submit-ta">
                                <span class="material-icons-outlined">send</span>
                                Submit Judul TA
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </main>
    </div>
</div>

<script>
function updateCharCount(textarea) {
    document.getElementById('char-count').textContent = textarea.value.length;
}

document.getElementById('form-ta').addEventListener('submit', function() {
    const btn = document.getElementById('btn-submit-ta');
    btn.disabled = true;
    btn.innerHTML = '<span class="material-icons-outlined" style="animation:spin 1s linear infinite">sync</span> Mengirim...';
});

const style = document.createElement('style');
style.textContent = '@keyframes spin { to { transform: rotate(360deg); } }';
document.head.appendChild(style);
</script>
</body>
</html>
