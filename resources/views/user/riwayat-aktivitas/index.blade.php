<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Aktivitas — SIMAKATA</title>
    
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
        }
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
        /* MAIN */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        /* TOPBAR */
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
        }
        .topbar-heading h1 { font-size: 18px; font-weight: 700; color: var(--text-1); }
        .topbar-heading p { font-size: 12px; color: var(--text-2); margin-top: 1px; }
        .topbar-right { display: flex; align-items: center; gap: 14px; }
        .topbar-user { display: flex; align-items: center; gap: 10px; }
        .topbar-user-name { font-size: 13px; font-weight: 600; color: var(--text-1); }
        .topbar-user-role { font-size: 11px; color: var(--text-2); }
        .topbar-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4a6fa5, #1a5fb4);
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 14px; font-weight: 700;
        }
        /* PAGE BODY */
        .page-body { flex: 1; padding: 28px 32px 32px; }
        /* STATS ROW */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }
        .stat-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .stat-icon .material-icons-outlined { font-size: 24px; }
        .si-blue { background: var(--blue-light); color: var(--blue-primary); }
        .si-amber { background: #fef3c7; color: #d97706; }
        .si-green { background: #d1fae5; color: #059669; }
        .stat-info h3 { font-size: 24px; font-weight: 700; color: var(--text-1); }
        .stat-info p { font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.7px; color: var(--text-3); margin-top: 2px; }
        /* CARD */
        .card {
            background: var(--card-bg);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
        }
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            border-bottom: 1px solid #f1f3f5;
        }
        .card-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 700;
            color: var(--text-1);
        }
        .card-title .material-icons-outlined { font-size: 22px; color: var(--blue-primary); }
        .filter-select {
            padding: 8px 32px 8px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 13px;
            font-family: inherit;
            color: var(--text-1);
            background: #fff;
            cursor: pointer;
        }
        /* TIMELINE */
        .timeline-section { padding: 24px 24px 0; }
        .timeline-date {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-3);
            margin-bottom: 16px;
        }
        .timeline-item {
            display: flex;
            gap: 16px;
            padding-bottom: 24px;
            border-left: 2px solid #e5e7eb;
            margin-left: 19px;
            position: relative;
        }
        .timeline-item:last-child { border-left-color: transparent; padding-bottom: 24px; }
        .timeline-dot {
            width: 40px; height: 40px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            position: absolute;
            left: -20px;
        }
        .timeline-dot .material-icons-outlined { font-size: 20px; }
        .td-blue { background: var(--blue-light); color: var(--blue-primary); border: 3px solid #fff; }
        .td-amber { background: #fef3c7; color: #d97706; border: 3px solid #fff; }
        .td-red { background: #fee2e2; color: #dc2626; border: 3px solid #fff; }
        .td-indigo { background: #ede9fe; color: #6d28d9; border: 3px solid #fff; }
        .timeline-content {
            flex: 1;
            padding-left: 36px;
        }
        .timeline-content h4 { font-size: 14px; font-weight: 700; color: var(--text-1); margin-bottom: 4px; }
        .timeline-content p { font-size: 13px; color: var(--text-2); line-height: 1.6; }
        .timeline-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 8px;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .badge-pending { background: #fef3c7; color: #d97706; }
        .badge-approved { background: #d1fae5; color: #059669; }
        .badge-rejected { background: #fee2e2; color: #dc2626; }
        .timeline-time {
            font-size: 11px;
            font-weight: 600;
            color: var(--text-3);
        }
        /* EMPTY STATE */
        .empty-state {
            padding: 60px 20px;
            text-align: center;
        }
        .empty-state .material-icons-outlined { font-size: 64px; color: var(--text-3); opacity: 0.3; margin-bottom: 16px; }
        .empty-state h3 { font-size: 16px; font-weight: 600; color: var(--text-2); margin-bottom: 8px; }
        .empty-state p { font-size: 13px; color: var(--text-3); }
    </style>
</head>
<body>
<div class="shell">

    <!-- SIDEBAR -->
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
            <a href="{{ route('user.kp-magang.create') }}" class="nav-item">
                <span class="material-icons-outlined">work_outline</span>
                <span>Input KP/Magang</span>
            </a>
            <a href="{{ route('user.tugas-akhir.create') }}" class="nav-item">
                <span class="material-icons-outlined">description</span>
                <span>Input Tugas Akhir</span>
            </a>
            <a href="{{ route('user.riwayat-aktivitas') }}" class="nav-item active">
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

    <!-- MAIN -->
    <div class="main">
        <!-- TOPBAR -->
        <header class="topbar">
            <div class="topbar-heading">
                <h1>Riwayat Aktivitas</h1>
                <p>Pantau semua aktivitas akademik dan pengajuan administrasi Anda di sini.</p>
            </div>
            <div class="topbar-right">
                <div class="topbar-user">
                    <div>
                        <div class="topbar-user-name">{{ $user->nama_lengkap }}</div>
                        <div class="topbar-user-role">Mahasiswa</div>
                    </div>
                    <div class="topbar-avatar" style="overflow:hidden;">
                        @if($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" style="width:100%;height:100%;object-fit:cover;">
                        @else
                            {{ strtoupper(substr($user->nama_lengkap, 0, 1)) }}
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- PAGE BODY -->
        <main class="page-body">
            
            <!-- STATS -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon si-blue">
                        <span class="material-icons-outlined">receipt_long</span>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $stats['total'] }}</h3>
                        <p>Total Pengajuan</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-amber">
                        <span class="material-icons-outlined">pending_actions</span>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $stats['pending'] }}</h3>
                        <p>Pending</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-green">
                        <span class="material-icons-outlined">check_circle</span>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $stats['disetujui'] }}</h3>
                        <p>Disetujui</p>
                    </div>
                </div>
            </div>

            <!-- TIMELINE CARD -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <span class="material-icons-outlined">timeline</span>
                        Timeline Aktivitas
                    </div>
                    <form method="GET" action="{{ route('user.riwayat-aktivitas') }}">
                        <select name="kegiatan" class="filter-select" onchange="this.form.submit()">
                            <option value="Semua Kegiatan" {{ $filterKegiatan === 'Semua Kegiatan' ? 'selected' : '' }}>Semua Kegiatan</option>
                            <option value="KP / Magang" {{ $filterKegiatan === 'KP / Magang' ? 'selected' : '' }}>KP / Magang</option>
                            <option value="Tugas Akhir" {{ $filterKegiatan === 'Tugas Akhir' ? 'selected' : '' }}>Tugas Akhir</option>
                        </select>
                    </form>
                </div>
                
                @if($riwayatMagang->isEmpty() && $riwayatTA->isEmpty())
                    <div class="empty-state">
                        <span class="material-icons-outlined">inbox</span>
                        <h3>Belum Ada Aktivitas</h3>
                        <p>Mulai ajukan KP/Magang atau Tugas Akhir untuk melihat riwayat di sini.</p>
                    </div>
                @else
                    <div class="timeline-section">
                        @php
                            $grouped = collect();
                            
                            // Group magang activities
                            foreach ($riwayatMagang as $magang) {
                                $date = \Carbon\Carbon::parse($magang->created_at);
                                if ($date->isToday()) {
                                    $group = 'Hari Ini';
                                } elseif ($date->isYesterday()) {
                                    $group = 'Kemarin';
                                } else {
                                    $group = $date->format('d M Y');
                                }
                                
                                $grouped->push([
                                    'group' => $group,
                                    'date' => $date,
                                    'type' => 'magang',
                                    'data' => $magang,
                                ]);
                            }
                            
                            // Group TA activities
                            foreach ($riwayatTA as $ta) {
                                $date = \Carbon\Carbon::parse($ta->created_at);
                                if ($date->isToday()) {
                                    $group = 'Hari Ini';
                                } elseif ($date->isYesterday()) {
                                    $group = 'Kemarin';
                                } else {
                                    $group = $date->format('d M Y');
                                }
                                
                                $grouped->push([
                                    'group' => $group,
                                    'date' => $date,
                                    'type' => 'ta',
                                    'data' => $ta,
                                ]);
                            }
                            
                            // Sort by date desc
                            $grouped = $grouped->sortByDesc('date');
                            
                            // Group by date label
                            $byGroup = $grouped->groupBy('group');
                        @endphp
                        
                        @foreach($byGroup as $groupLabel => $items)
                            <div class="timeline-date">• {{ $groupLabel }}</div>
                            
                            @foreach($items as $item)
                                @if($item['type'] === 'magang')
                                    @php
                                        $magang = $item['data'];
                                        $dotClass = 'td-blue';
                                        $icon = 'work_outline';
                                        $badgeClass = 'badge-pending';
                                        $badgeText = 'Menunggu Verifikasi';
                                        
                                        if ($magang->status === 'approved') {
                                            $dotClass = 'td-blue';
                                            $icon = 'check_circle';
                                            $badgeClass = 'badge-approved';
                                            $badgeText = 'Disetujui';
                                        } elseif ($magang->status === 'rejected') {
                                            $dotClass = 'td-red';
                                            $icon = 'cancel';
                                            $badgeClass = 'badge-rejected';
                                            $badgeText = 'Ditolak';
                                        } else {
                                            // default: pending
                                            $dotClass = 'td-amber';
                                            $icon = 'pending_actions';
                                        }
                                    @endphp
                                    
                                    <div class="timeline-item">
                                        <div class="timeline-dot {{ $dotClass }}">
                                            <span class="material-icons-outlined">{{ $icon }}</span>
                                        </div>
                                        <div class="timeline-content">
                                            <h4>Pengajuan {{ $magang->kegiatan }} di {{ $magang->perusahaan->nama ?? 'Perusahaan' }}</h4>
                                            <p>{{ $magang->posisi ?? 'Divisi tidak disebutkan' }} • {{ $magang->perusahaan->lokasi ?? 'Jakarta' }}</p>
                                            <div class="timeline-meta">
                                                <span class="badge {{ $badgeClass }}">{{ $badgeText }}</span>
                                                <span class="timeline-time">{{ \Carbon\Carbon::parse($magang->created_at)->format('H:i') }} WIB</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @php
                                        $ta = $item['data'];
                                        $dotClass = 'td-indigo';
                                        $icon = 'description';
                                        $badgeClass = 'badge-pending';
                                        $badgeText = 'Menunggu Verifikasi';
                                        
                                        if ($ta->status === 'approved') {
                                            $dotClass = 'td-blue';
                                            $icon = 'check_circle';
                                            $badgeClass = 'badge-approved';
                                            $badgeText = 'Disetujui';
                                        } elseif ($ta->status === 'rejected') {
                                            $dotClass = 'td-red';
                                            $icon = 'cancel';
                                            $badgeClass = 'badge-rejected';
                                            $badgeText = 'Ditolak';
                                        }
                                    @endphp
                                    
                                    <div class="timeline-item">
                                        <div class="timeline-dot {{ $dotClass }}">
                                            <span class="material-icons-outlined">{{ $icon }}</span>
                                        </div>
                                        <div class="timeline-content">
                                            <h4>Judul Tugas Akhir {{ ucfirst($badgeText) }}</h4>
                                            <p>Topik: {{ $ta->title }}</p>
                                            <div class="timeline-meta">
                                                <span class="badge {{ $badgeClass }}">{{ $badgeText }}</span>
                                                <span class="timeline-time">{{ \Carbon\Carbon::parse($ta->created_at)->format('H:i') }} WIB</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                @endif
            </div>

        </main>
    </div>

</div>
</body>
</html>
