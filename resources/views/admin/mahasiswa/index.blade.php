@extends('layouts.admin')

@section('title', 'Data Mahasiswa')

@section('extra_styles')
<style>
    /* ===== PAGE TOOLBAR ===== */
    .toolbar {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }
    .toolbar .search-box {
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 8px 14px;
        background: #fff;
        transition: border-color .2s, box-shadow .2s;
        flex: 1;
        min-width: 220px;
    }
    .toolbar .search-box:focus-within { border-color: #1a5fb4; box-shadow: 0 0 0 3px rgba(26,95,180,.08); }
    .toolbar .search-box input { border: none; outline: none; font-size: 13px; font-family: inherit; color: #374151; background: transparent; width: 100%; }
    .toolbar .search-box input::placeholder { color: #9ca3af; }
    .toolbar .search-box .material-icons-outlined { font-size: 18px; color: #9ca3af; }
    .toolbar select {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 8px 14px;
        font-size: 13px;
        font-family: inherit;
        color: #374151;
        background: #fff;
        cursor: pointer;
        outline: none;
        transition: border-color .2s;
    }
    .toolbar select:focus { border-color: #1a5fb4; }

    /* Buttons */
    .btn-primary {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 18px; border-radius: 10px;
        background: #1a5fb4; color: #fff;
        font-size: 13px; font-weight: 600; font-family: inherit;
        border: none; cursor: pointer; text-decoration: none;
        transition: background .2s;
    }
    .btn-primary:hover { background: #1e40af; color: #fff; }
    .btn-primary .material-icons-outlined { font-size: 18px; }

    .btn-outline {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 9px 18px; border-radius: 10px;
        border: 1.5px solid #1a5fb4; color: #1a5fb4;
        background: #fff;
        font-size: 13px; font-weight: 600; font-family: inherit;
        cursor: pointer; text-decoration: none;
        transition: all .2s;
    }
    .btn-outline:hover { background: #1a5fb4; color: #fff; }
    .btn-outline .material-icons-outlined { font-size: 18px; }

    /* ===== PREMIUM SUMMARY CARDS ===== */
    .summary-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }
    .summary-card {
        padding: 20px 22px;
        display: flex; align-items: center; gap: 14px;
        animation: fade-up .4s ease both;
        /* Premium Enhancement */
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    /* Accent Line */
    .summary-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, currentColor, transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    /* Premium Hover Effect */
    .summary-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1), 0 2px 6px rgba(0, 0, 0, 0.06);
        border-color: #d1d5db;
    }
    
    .summary-card:hover::before {
        opacity: 1;
    }
    
    .summary-card:nth-child(1) { animation-delay: .05s; }
    .summary-card:nth-child(2) { animation-delay: .10s; }
    .summary-card:nth-child(3) { animation-delay: .15s; }
    
    /* Set accent colors */
    .summary-card:nth-child(1)::before { color: #1a5fb4; }
    .summary-card:nth-child(2)::before { color: #15803d; }
    .summary-card:nth-child(3)::before { color: #ea580c; }
    
    .summary-icon {
        width: 46px; height: 46px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }
    
    /* Icon Animation */
    .summary-card:hover .summary-icon {
        transform: scale(1.1);
    }
    
    .summary-icon.blue   { background: #eff6ff; color: #1a5fb4; }
    .summary-icon.green  { background: #f0fdf4; color: #15803d; }
    .summary-icon.orange { background: #fff7ed; color: #ea580c; }
    .summary-icon .material-icons-outlined { font-size: 22px; }
    .summary-label { font-size: 11px; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: .6px; margin-bottom: 4px; transition: color 0.3s ease; }
    
    .summary-card:hover .summary-label {
        color: #1a5fb4;
    }
    
    .summary-value { font-size: 26px; font-weight: 700; color: #111827; transition: all 0.3s ease; }
    
    /* Number Emphasis */
    .summary-card:hover .summary-value {
        transform: scale(1.02);
        transform-origin: left;
    }

    @keyframes fade-up {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ===== PREMIUM TABLE CARD ===== */
    .table-card { 
        animation: fade-up .4s ease .2s both; 
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Subtle Hover */
    .table-card:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08), 0 2px 4px rgba(0, 0, 0, 0.04);
        border-color: #d1d5db;
    }
    .table-card-header {
        display: flex; align-items: center; justify-content: space-between;
        padding: 20px 24px 16px;
        border-bottom: 1px solid #f3f4f6;
        flex-wrap: wrap; gap: 12px;
    }
    .table-card-header h2 { font-size: 16px; font-weight: 700; color: #111827; }

    .data-table { width: 100%; border-collapse: collapse; }
    .data-table thead tr { border-bottom: 1px solid #f3f4f6; }
    .data-table th {
        padding: 10px 20px;
        font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .7px;
        color: #9ca3af; text-align: left; white-space: nowrap;
    }
    .data-table td {
        padding: 13px 20px;
        font-size: 13px; color: #374151;
        border-bottom: 1px solid #f9fafb; vertical-align: middle;
    }
    .data-table tbody tr { transition: background .15s; }
    .data-table tbody tr:hover { background: #f9fafb; }
    .data-table tbody tr:last-child td { border-bottom: none; }

    /* Avatar chip */
    .mhs-cell { display: flex; align-items: center; gap: 11px; }
    .mhs-avatar {
        width: 36px; height: 36px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 12px; font-weight: 700; flex-shrink: 0;
    }
    .mhs-avatar.c1 { background: #dbeafe; color: #1d4ed8; }
    .mhs-avatar.c2 { background: #d1fae5; color: #065f46; }
    .mhs-avatar.c3 { background: #ede9fe; color: #6d28d9; }
    .mhs-avatar.c4 { background: #ffedd5; color: #c2410c; }
    .mhs-avatar.c5 { background: #fce7f3; color: #9d174d; }
    .mhs-name { font-size: 13px; font-weight: 600; color: #111827; }
    .mhs-nim  { font-size: 11px; color: #6b7280; }

    /* Status badge */
    .badge {
        display: inline-block; padding: 3px 10px; border-radius: 6px;
        font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .4px;
    }
    .badge-aktif   { background: #dcfce7; color: #15803d; }
    .badge-cuti    { background: #fef3c7; color: #92400e; }
    .badge-lulus   { background: #dbeafe; color: #1d4ed8; }
    .badge-nonaktif{ background: #fee2e2; color: #b91c1c; }

    /* Action buttons */
    .action-group { display: flex; align-items: center; gap: 6px; }
    .btn-icon {
        width: 30px; height: 30px; border-radius: 8px;
        border: 1px solid #e5e7eb; background: #fff;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; color: #6b7280; text-decoration: none;
        transition: border-color .2s, color .2s, background .2s;
    }
    .btn-icon .material-icons-outlined { font-size: 16px; }
    .btn-icon:hover { border-color: #1a5fb4; color: #1a5fb4; }
    .btn-icon.danger:hover { border-color: #dc2626; color: #dc2626; }

    /* Table footer */
    .table-footer {
        display: flex; align-items: center; justify-content: space-between;
        padding: 14px 20px; border-top: 1px solid #f3f4f6;
        flex-wrap: wrap; gap: 12px;
    }
    .table-info { font-size: 12px; color: #6b7280; }
    .table-info strong { color: #111827; }

    /* Pagination links styling */
    .pagination-nav { display: flex; align-items: center; gap: 4px; }
    .pagination-nav a, .pagination-nav span {
        padding: 5px 12px; border-radius: 8px; border: 1px solid #e5e7eb;
        font-size: 12px; font-weight: 600; font-family: inherit;
        color: #374151; text-decoration: none; background: #fff;
        transition: all .18s;
    }
    .pagination-nav a:hover { border-color: #1a5fb4; color: #1a5fb4; }
    .pagination-nav span.current {
        background: #1a5fb4; border-color: #1a5fb4; color: #fff;
    }
    .pagination-nav span.disabled { opacity: .4; cursor: not-allowed; }

    /* Alert */
    .alert {
        padding: 12px 16px; border-radius: 10px;
        font-size: 13px; margin-bottom: 20px;
        display: flex; align-items: center; gap: 8px;
    }
    .alert-success { background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }
    .alert-error   { background: #fee2e2; color: #b91c1c; border: 1px solid #fecaca; }
    .alert .material-icons-outlined { font-size: 18px; }

    /* Empty state */
    .empty-state { text-align: center; padding: 48px 24px; color: #9ca3af; }
    .empty-state .material-icons-outlined { font-size: 40px; display: block; margin-bottom: 12px; }
    .empty-state p { font-size: 13px; }

    @media (max-width: 900px) {
        .summary-row { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 600px) {
        .summary-row { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1>Data Mahasiswa</h1>
        <p class="subtitle">Kelola akun dan informasi seluruh mahasiswa yang terdaftar di SIMAKATA.</p>
    </div>
    <div style="display:flex;gap:10px;flex-wrap:wrap;align-items:center;">
        <a href="{{ route('admin.mahasiswa.export-pdf', request()->only(['angkatan','status'])) }}"
           class="btn-outline" id="btn-export-mhs-pdf">
            <span class="material-icons-outlined">picture_as_pdf</span>
            Export PDF
        </a>
        <a href="{{ route('admin.mahasiswa.create') }}" class="btn-primary" id="btn-tambah-mhs">
            <span class="material-icons-outlined">person_add</span>
            Tambah Mahasiswa
        </a>
    </div>
</div>

{{-- Flash Messages --}}
@if(session('success'))
    <div class="alert alert-success" role="alert">
        <span class="material-icons-outlined">check_circle</span>
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-error" role="alert">
        <span class="material-icons-outlined">error</span>
        {{ session('error') }}
    </div>
@endif

{{-- Summary Cards --}}
<div class="summary-row">
    <div class="card summary-card">
        <div class="summary-icon blue">
            <span class="material-icons-outlined">groups</span>
        </div>
        <div>
            <div class="summary-label">Total Mahasiswa</div>
            <div class="summary-value">{{ $totalMhs }}</div>
        </div>
    </div>
    <div class="card summary-card">
        <div class="summary-icon green">
            <span class="material-icons-outlined">how_to_reg</span>
        </div>
        <div>
            <div class="summary-label">Mahasiswa Aktif</div>
            <div class="summary-value">{{ \App\Models\User::where('role','user')->where('status_akademik','Aktif')->count() }}</div>
        </div>
    </div>
    <div class="card summary-card">
        <div class="summary-icon orange">
            <span class="material-icons-outlined">school</span>
        </div>
        <div>
            <div class="summary-label">Sudah Lulus</div>
            <div class="summary-value">{{ \App\Models\User::where('role','user')->where('status_akademik','Lulus')->count() }}</div>
        </div>
    </div>
</div>

{{-- Table Card --}}
<div class="card table-card">
    <div class="table-card-header">
        <h2>Daftar Mahasiswa</h2>
        <form method="GET" action="{{ route('admin.mahasiswa.index') }}" class="toolbar" id="filter-form">
            <div class="search-box">
                <span class="material-icons-outlined">search</span>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari NIM, nama, email..."
                       id="search-input" autocomplete="off">
            </div>
            <button type="submit" class="btn-primary" style="padding:9px 14px;" title="Cari">
                <span class="material-icons-outlined" style="font-size:18px;">search</span>
            </button>
        </form>
    </div>

    <table class="data-table" id="mhs-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Mahasiswa</th>
                <th>Angkatan</th>
                <th>Program Studi</th>
                <th>Semester</th>
                <th>Kontak</th>
                <th>Status</th>
                <th style="text-align: right;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswa as $i => $mhs)
                @php
                    $colors = ['c1','c2','c3','c4','c5'];
                    $color  = $colors[$i % 5];
                    $initials = strtoupper(mb_substr($mhs->nama_lengkap ?? $mhs->nim, 0, 2));
                @endphp
                <tr>
                    <td style="color:#9ca3af;font-size:12px;">{{ $mahasiswa->firstItem() + $i }}</td>
                    <td>
                        <div class="mhs-cell">
                            <div class="mhs-avatar {{ $color }}">{{ $initials }}</div>
                            <div>
                                <div class="mhs-name">{{ $mhs->nama_lengkap ?? '—' }}</div>
                                <div class="mhs-nim">{{ $mhs->nim }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $mhs->angkatan ?? '—' }}</td>
                    <td>{{ $mhs->program_studi ?? '—' }}</td>
                    <td>{{ $mhs->semester_aktif ? 'Sem. '.$mhs->semester_aktif : '—' }}</td>
                    <td>
                        <div style="font-size:12px;">
                            @if($mhs->email)
                                <div style="color:#374151;">{{ $mhs->email }}</div>
                            @endif
                            @if($mhs->nomor_telepon)
                                <div style="color:#6b7280;">{{ $mhs->nomor_telepon }}</div>
                            @endif
                            @if(!$mhs->email && !$mhs->nomor_telepon)
                                <span style="color:#9ca3af;">—</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        @php $st = $mhs->status_akademik ?? 'Aktif'; @endphp
                        @if($st === 'Aktif')
                            <span class="badge badge-aktif">Aktif</span>
                        @elseif($st === 'Cuti')
                            <span class="badge badge-cuti">Cuti</span>
                        @elseif($st === 'Lulus')
                            <span class="badge badge-lulus">Lulus</span>
                        @else
                            <span class="badge badge-nonaktif">{{ $st }}</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-group" style="justify-content: flex-end;">
                            <a href="{{ route('admin.mahasiswa.edit', $mhs) }}"
                               class="btn-icon" title="Edit" id="btn-edit-mhs-{{ $mhs->id }}">
                                <span class="material-icons-outlined">edit</span>
                            </a>
                            <form method="POST"
                                  action="{{ route('admin.mahasiswa.destroy', $mhs) }}"
                                  onsubmit="return confirm('Yakin hapus mahasiswa {{ addslashes($mhs->nama_lengkap ?? $mhs->nim) }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon danger"
                                        title="Hapus" id="btn-del-mhs-{{ $mhs->id }}">
                                    <span class="material-icons-outlined">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">
                        <div class="empty-state">
                            <span class="material-icons-outlined">person_search</span>
                            <p>Tidak ada data mahasiswa yang ditemukan.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table-footer">
        <div class="table-info">
            Menampilkan <strong>{{ $mahasiswa->firstItem() ?? 0 }}–{{ $mahasiswa->lastItem() ?? 0 }}</strong>
            dari <strong>{{ $mahasiswa->total() }}</strong> mahasiswa
        </div>
        <div class="pagination-nav">
            @if($mahasiswa->onFirstPage())
                <span class="disabled">‹</span>
            @else
                <a href="{{ $mahasiswa->previousPageUrl() }}">‹</a>
            @endif

            @foreach($mahasiswa->getUrlRange(max(1,$mahasiswa->currentPage()-2), min($mahasiswa->lastPage(),$mahasiswa->currentPage()+2)) as $page => $url)
                @if($page == $mahasiswa->currentPage())
                    <span class="current">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

            @if($mahasiswa->hasMorePages())
                <a href="{{ $mahasiswa->nextPageUrl() }}">›</a>
            @else
                <span class="disabled">›</span>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Live search (client side — debounce submit)
    const searchInput = document.getElementById('search-input');
    let debounceTimer;
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                document.getElementById('filter-form').submit();
            }, 500);
        });
    }
</script>
@endsection
