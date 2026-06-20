<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Riwayat Magang & Kerja Praktik Mahasiswa Informatika UNSOED - SIMAKATA">
    <title>Riwayat Magang - SIMAKATA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --blue-dark: #0a3d6b; --blue-main: #1a5fb4; --blue-mid: #2563eb;
            --text-dark: #0f172a; --text-mid: #334155; --text-gray: #64748b;
            --border: #e2e8f0; --bg-page: #f8fafc; --white: #ffffff;
        }
        body { font-family: 'Inter', sans-serif; background: var(--bg-page); color: var(--text-dark); }
        a { text-decoration: none; color: inherit; }

        /* NAVBAR */
        .navbar {
            position: sticky; top: 0; z-index: 999;
            background: rgba(255,255,255,0.92); backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(226,232,240,0.6);
            padding: 0 40px; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
            box-shadow: 0 2px 20px rgba(0,0,0,0.06);
        }
        .navbar-logo { font-size: 18px; font-weight: 800; color: var(--blue-main); letter-spacing: 1.5px; }
        .navbar-links { display: flex; align-items: center; gap: 28px; list-style: none; }
        .navbar-links a { font-size: 14px; font-weight: 500; color: var(--text-mid); transition: color 0.2s; }
        .navbar-links a:hover, .navbar-links a.active { color: var(--blue-main); }
        .navbar-actions { display: flex; align-items: center; gap: 10px; }
        .btn-nav { padding: 8px 18px; border-radius: 8px; font-size: 13px; font-weight: 600; transition: all 0.2s; font-family: inherit; cursor: pointer; border: 1.5px solid var(--blue-main); }
        .btn-nav-outline { color: var(--blue-main); background: transparent; }
        .btn-nav-outline:hover { background: #eff6ff; }
        .btn-nav-fill { color: #fff; background: var(--blue-main); }
        .btn-nav-fill:hover { background: var(--blue-dark); border-color: var(--blue-dark); }
        .btn-nav-logout { color: #dc2626; background: #fff5f5; border-color: #fca5a5; }
        .btn-nav-logout:hover { background: #fee2e2; }

        /* HERO */
        .page-hero {
            background: linear-gradient(135deg, #0a3d6b 0%, #1a5fb4 100%);
            padding: 48px 40px 36px; text-align: center; color: #fff;
        }
        .page-hero h1 { font-size: 32px; font-weight: 800; margin-bottom: 10px; }
        .page-hero p { font-size: 15px; color: rgba(255,255,255,0.85); max-width: 520px; margin: 0 auto; }

        /* CONTENT */
        .content-wrap { max-width: 1200px; margin: 0 auto; padding: 32px 24px; }

        /* FILTER BAR */
        .filter-bar {
            display: flex; gap: 12px; flex-wrap: wrap; align-items: center;
            margin-bottom: 24px; background: #fff;
            border: 1px solid var(--border); border-radius: 12px; padding: 16px 20px;
        }
        .search-input-wrap { display: flex; align-items: center; gap: 8px; flex: 1; min-width: 200px; }
        .search-input-wrap .material-icons-outlined { color: #9ca3af; font-size: 20px; }
        .search-input-wrap input { flex: 1; border: none; outline: none; font-size: 14px; font-family: inherit; color: var(--text-dark); }
        .search-input-wrap input::placeholder { color: #9ca3af; }
        .filter-select {
            padding: 8px 14px; border: 1px solid var(--border); border-radius: 8px;
            font-size: 13px; font-family: inherit; color: var(--text-mid); background: #fff; outline: none; cursor: pointer;
        }
        .btn-search {
            padding: 9px 20px; background: #059669; color: #fff; border: none;
            border-radius: 8px; font-size: 13px; font-weight: 600; font-family: inherit; cursor: pointer; transition: background 0.2s;
        }
        .btn-search:hover { background: #047857; }

        /* TABLE */
        .table-card { background: #fff; border: 1px solid var(--border); border-radius: 14px; overflow: hidden; }
        .table-header { padding: 20px 24px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; }
        .table-header h2 { font-size: 16px; font-weight: 700; color: var(--text-dark); }
        .table-count { font-size: 12px; color: var(--text-gray); background: #f1f5f9; padding: 4px 10px; border-radius: 99px; font-weight: 600; }
        table { width: 100%; border-collapse: collapse; }
        th {
            padding: 12px 20px; text-align: left; font-size: 10px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.6px; color: #94a3b8;
            background: #f8fafc; border-bottom: 1px solid var(--border);
        }
        td { padding: 14px 20px; font-size: 13px; color: var(--text-mid); border-bottom: 1px solid #f8fafc; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #f8fafc; }
        .name-cell { font-weight: 600; color: var(--text-dark); }
        .nim-cell { font-size: 11px; color: var(--text-gray); margin-top: 2px; }
        .status-badge {
            display: inline-block; padding: 3px 10px; border-radius: 99px;
            font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;
        }
        .badge-approved { background: #dcfce7; color: #15803d; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-rejected { background: #fee2e2; color: #b91c1c; }
        .badge-review { background: #fef3c7; color: #92400e; }
        .kegiatan-chip {
            display: inline-block; padding: 2px 8px; border-radius: 6px;
            font-size: 11px; font-weight: 600; background: #eff6ff; color: var(--blue-main);
        }

        /* EMPTY */
        .empty-state { text-align: center; padding: 60px 24px; color: #94a3b8; }
        .empty-state .material-icons-outlined { font-size: 48px; display: block; margin-bottom: 12px; }
        .empty-state p { font-size: 14px; }

        /* PAGINATION */
        .pagination-wrap { padding: 16px 24px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
        .pagination-info { font-size: 12px; color: var(--text-gray); }

        footer { text-align: center; padding: 24px; font-size: 12px; color: #94a3b8; border-top: 1px solid var(--border); margin-top: 40px; }
    </style>
</head>
<body>
@include('components.navbar')

<div class="page-hero">
    <h1>Riwayat Magang & Kerja Praktik</h1>
    <p>Data historis kegiatan magang, MBKM, MSIB, dan Kerja Praktik mahasiswa Informatika Universitas Jenderal Soedirman.</p>
</div>

<div class="content-wrap">
    <form class="filter-bar" method="GET" action="{{ route('riwayat.index') }}">
        <div class="search-input-wrap">
            <span class="material-icons-outlined">search</span>
            <input type="text" name="search" placeholder="Cari nama mahasiswa, NIM, atau perusahaan..." value="{{ request('search') }}">
        </div>
        <select name="kegiatan" class="filter-select" onchange="this.form.submit()">
            <option value="Semua" {{ !request('kegiatan') || request('kegiatan') === 'Semua' ? 'selected' : '' }}>Semua Kegiatan</option>
            @foreach($jenisKegiatan as $jk)
                <option value="{{ $jk }}" {{ request('kegiatan') === $jk ? 'selected' : '' }}>{{ $jk }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn-search">Cari</button>
    </form>

    <div class="table-card">
        <div class="table-header">
            <h2>Riwayat Magang & KP</h2>
            <span class="table-count">{{ $riwayat->total() }} Data</span>
        </div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Mahasiswa</th>
                        <th>Kegiatan</th>
                        <th>Perusahaan / Instansi</th>
                        <th>Posisi</th>
                        <th>Periode</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayat as $item)
                        <tr>
                            <td style="color:#94a3b8; font-size:12px;">{{ $riwayat->firstItem() + $loop->index }}</td>
                            <td>
                                <div class="name-cell">{{ $item->nama ?? '-' }}</div>
                                <div class="nim-cell">{{ $item->nim ?: 'NIM tidak tersedia' }}</div>
                            </td>
                            <td><span class="kegiatan-chip">{{ $item->kegiatan ?? '-' }}</span></td>
                            <td style="font-weight:500; color:var(--text-dark); max-width:200px;">{{ $item->perusahaan->nama ?? '-' }}</td>
                            <td>{{ $item->posisi ?? '-' }}</td>
                            <td style="font-size:12px; color:var(--text-gray);">{{ $item->periode ?? '-' }}</td>
                            <td>
                                @php
                                    $st = strtolower($item->status ?? '');
                                @endphp
                                @if($st === 'disetujui' || $st === 'approved')
                                    <span class="status-badge badge-approved">Disetujui</span>
                                @elseif($st === 'ditolak' || $st === 'rejected')
                                    <span class="status-badge badge-rejected">Ditolak</span>
                                @else
                                    <span class="status-badge badge-review">{{ $item->status ?? 'Pending' }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <span class="material-icons-outlined">history</span>
                                    <p>Belum ada data riwayat magang yang tersedia.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($riwayat->hasPages())
        <div class="pagination-wrap">
            <div class="pagination-info">Menampilkan {{ $riwayat->firstItem() ?? 0 }}–{{ $riwayat->lastItem() ?? 0 }} dari {{ $riwayat->total() }} data</div>
            <div>{{ $riwayat->links() }}</div>
        </div>
        @endif
    </div>
</div>

@include('components.footer')
</body>
</html>
