<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Daftar Judul Tugas Akhir Mahasiswa Informatika UNSOED - SIMAKATA">
    <title>Judul Tugas Akhir - SIMAKATA</title>
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
            background: linear-gradient(160deg, #0a3d6b 0%, #1a5fb4 60%, #2563eb 100%);
            padding: 48px 40px 36px; text-align: center; color: #fff;
        }
        .page-hero h1 { font-size: 32px; font-weight: 800; margin-bottom: 10px; }
        .page-hero p { font-size: 15px; color: rgba(255,255,255,0.8); max-width: 520px; margin: 0 auto; }

        /* CONTENT */
        .content-wrap { max-width: 1400px; margin: 0 auto; padding: 32px 24px; }

        /* FILTER BAR */
        .filter-bar {
            display: flex; gap: 12px; flex-wrap: wrap; align-items: center;
            margin-bottom: 24px; background: #fff;
            border: 1px solid var(--border); border-radius: 12px; padding: 16px 20px;
        }
        .search-input-wrap { display: flex; align-items: center; gap: 8px; flex: 1; min-width: 200px; }
        .search-input-wrap .material-icons-outlined { color: #9ca3af; font-size: 20px; }
        .search-input-wrap input {
            flex: 1; border: none; outline: none; font-size: 14px; font-family: inherit; color: var(--text-dark);
        }
        .search-input-wrap input::placeholder { color: #9ca3af; }
        .filter-select {
            padding: 8px 14px; border: 1px solid var(--border); border-radius: 8px;
            font-size: 13px; font-family: inherit; color: var(--text-mid); background: #fff; outline: none; cursor: pointer;
        }
        .btn-search {
            padding: 9px 20px; background: var(--blue-main); color: #fff; border: none;
            border-radius: 8px; font-size: 13px; font-weight: 600; font-family: inherit; cursor: pointer;
            transition: background 0.2s;
        }
        .btn-search:hover { background: var(--blue-dark); }

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
        td { padding: 16px 20px; font-size: 13px; color: var(--text-mid); border-bottom: 1px solid #f8fafc; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #f8fafc; }

        .title-cell { font-weight: 600; color: var(--text-dark); max-width: 320px; }
        .nim-cell { font-size: 11px; color: var(--text-gray); margin-top: 2px; }
        .status-badge {
            display: inline-block; padding: 3px 10px; border-radius: 99px;
            font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;
        }
        .badge-approved { background: #dcfce7; color: #15803d; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-rejected { background: #fee2e2; color: #b91c1c; }

        /* EMPTY */
        .empty-state { text-align: center; padding: 60px 24px; color: #94a3b8; }
        .empty-state .material-icons-outlined { font-size: 48px; display: block; margin-bottom: 12px; }
        .empty-state p { font-size: 14px; }

        /* PAGINATION */
        .pagination-wrap { padding: 16px 24px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
        .pagination-info { font-size: 12px; color: var(--text-gray); }
        .pagination-links { display: flex; gap: 6px; }
        .pagination-links a, .pagination-links span {
            padding: 6px 12px; border-radius: 7px; font-size: 13px; font-weight: 500;
            border: 1px solid var(--border); color: var(--text-mid); background: #fff; transition: all 0.15s;
        }
        .pagination-links a:hover { border-color: var(--blue-main); color: var(--blue-main); }
        .pagination-links span[aria-current="page"] { background: var(--blue-main); color: #fff; border-color: var(--blue-main); }

        /* FOOTER */
        footer { text-align: center; padding: 24px; font-size: 12px; color: #94a3b8; border-top: 1px solid var(--border); margin-top: 40px; }
    </style>
</head>
<body>
@include('components.navbar')

<div class="page-hero">
    <h1>Validasi Judul Tugas Akhir</h1>
    <p>Daftar judul Tugas Akhir mahasiswa Informatika yang telah diproses dan diverifikasi oleh tim akademik.</p>
</div>

<div class="content-wrap">
    <form class="filter-bar" method="GET" action="{{ route('judul-ta.index') }}">
        <div class="search-input-wrap">
            <span class="material-icons-outlined">search</span>
            <input type="text" name="search" placeholder="Cari judul TA atau NIM..." value="{{ request('search') }}">
        </div>
        <select name="status" class="filter-select" onchange="this.form.submit()">
            <option value="Semua" {{ request('status') === 'Semua' || !request('status') ? 'selected' : '' }}>Semua Status</option>
            <option value="Disetujui" {{ request('status') === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
            <option value="Pending" {{ request('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Ditolak" {{ request('status') === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit" class="btn-search">Cari</button>
    </form>

    <div class="table-card">
        <div class="table-header">
            <h2>Daftar Judul Tugas Akhir</h2>
            <span class="table-count">{{ $judulTa->total() }} Judul</span>
        </div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul TA</th>
                        <th>NIM Mahasiswa</th>
                        <th>Tanggal Submit</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($judulTa as $item)
                        <tr data-project-id="{{ $item->id }}">
                            <td style="color:#94a3b8; font-size:12px;">{{ $judulTa->firstItem() + $loop->index }}</td>
                            <td>
                                <div class="title-cell">{{ $item->title ?? '-' }}</div>
                            </td>
                            <td>
                                <div style="font-weight:600; color:var(--text-dark);">{{ $item->student->nim ?? '-' }}</div>
                                <div class="nim-cell">{{ $item->student->nama_lengkap ?? 'Mahasiswa' }}</div>
                            </td>
                            <td>{{ $item->submitted_at ? \Carbon\Carbon::parse($item->submitted_at)->format('d M Y') : ($item->created_at ? $item->created_at->format('d M Y') : '-') }}</td>
                            <td>
                                @if($item->status === 'approved')
                                    <span class="status-badge badge-approved">Disetujui</span>
                                @elseif($item->status === 'pending')
                                    <span class="status-badge badge-pending">Menunggu</span>
                                @elseif($item->status === 'rejected')
                                    <span class="status-badge badge-rejected">Ditolak</span>
                                @else
                                    <span class="status-badge badge-pending">{{ $item->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <span class="material-icons-outlined">article</span>
                                    <p>Belum ada data judul TA yang tersedia.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($judulTa->hasPages())
        <div class="pagination-wrap">
            <div class="pagination-info">Menampilkan {{ $judulTa->firstItem() ?? 0 }}–{{ $judulTa->lastItem() ?? 0 }} dari {{ $judulTa->total() }} judul</div>
            <div class="pagination-links">
                {{-- Previous Button --}}
                @if($judulTa->onFirstPage())
                    <span class="disabled"><span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle;">chevron_left</span></span>
                @else
                    <a href="{{ $judulTa->previousPageUrl() }}"><span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle;">chevron_left</span></a>
                @endif

                {{-- Page Numbers --}}
                @foreach($judulTa->getUrlRange(1, $judulTa->lastPage()) as $page => $url)
                    @if($page == $judulTa->currentPage())
                        <span aria-current="page">{{ $page }}</span>
                    @elseif($page == 1 || $page == $judulTa->lastPage() || abs($page - $judulTa->currentPage()) <= 2)
                        <a href="{{ $url }}">{{ $page }}</a>
                    @elseif($page == 2 || $page == $judulTa->lastPage() - 1)
                        <span style="border: none; background: transparent; padding: 6px 4px;">...</span>
                    @endif
                @endforeach

                {{-- Next Button --}}
                @if($judulTa->hasMorePages())
                    <a href="{{ $judulTa->nextPageUrl() }}"><span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle;">chevron_right</span></a>
                @else
                    <span class="disabled"><span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle;">chevron_right</span></span>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>

@include('components.footer')
</body>
</html>
