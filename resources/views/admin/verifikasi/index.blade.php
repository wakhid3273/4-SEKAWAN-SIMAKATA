@extends('layouts.admin')

@section('title', 'Verifikasi Data')

@section('extra_styles')
<style>
    /* ===== STATS CARDS ===== */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 28px;
    }
    .stat-card {
        background: #fff;
        border-radius: 14px;
        padding: 20px 22px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        border: 1px solid rgba(0,0,0,0.04);
    }
    .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .stat-icon .material-icons-outlined { font-size: 22px; }
    .stat-icon.blue   { background: #e8f0fb; color: #1a5fb4; }
    .stat-icon.yellow { background: #fff8e1; color: #f59e0b; }
    .stat-icon.green  { background: #e6f9f0; color: #16a34a; }
    .stat-icon.red    { background: #fef2f2; color: #dc2626; }
    .stat-info .label { font-size: 12px; color: #6b7280; margin-bottom: 3px; }
    .stat-info .value { font-size: 26px; font-weight: 700; color: #111827; line-height: 1; }

    /* ===== TABS ===== */
    .tabs-bar {
        display: flex;
        border-bottom: 2px solid #e5e7eb;
        margin-bottom: 22px;
        gap: 4px;
    }
    .tab-btn {
        padding: 11px 22px;
        font-size: 14px;
        font-weight: 500;
        color: #6b7280;
        background: none;
        border: none;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        cursor: pointer;
        transition: color 0.18s, border-color 0.18s;
        font-family: inherit;
    }
    .tab-btn.active {
        color: #1a5fb4;
        border-bottom-color: #1a5fb4;
        font-weight: 600;
    }
    .tab-btn:hover:not(.active) { color: #374151; }
    .tab-content { display: none; }
    .tab-content.active { display: block; }

    /* ===== TOOLBAR ===== */
    .toolbar {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
        flex-wrap: wrap;
    }
    .search-wrap {
        flex: 1;
        min-width: 220px;
        position: relative;
    }
    .search-wrap .material-icons-outlined {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 18px;
    }
    .search-input {
        width: 100%;
        padding: 9px 14px 9px 38px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        font-size: 13px;
        font-family: inherit;
        background: #fff;
        color: #111827;
        transition: border-color 0.18s;
    }
    .search-input:focus { outline: none; border-color: #1a5fb4; }
    .search-input::placeholder { color: #9ca3af; }

    .select-filter {
        padding: 9px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        font-size: 13px;
        font-family: inherit;
        background: #fff;
        color: #374151;
        cursor: pointer;
        transition: border-color 0.18s;
    }
    .select-filter:focus { outline: none; border-color: #1a5fb4; }

    /* ===== TABLE ===== */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        border: 1px solid rgba(0,0,0,0.04);
    }
    .data-table thead tr {
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }
    .data-table th {
        padding: 12px 16px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #6b7280;
        text-align: left;
        white-space: nowrap;
    }
    .data-table td {
        padding: 14px 16px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #f3f4f6;
        vertical-align: middle;
    }
    .data-table tbody tr:last-child td { border-bottom: none; }
    .data-table tbody tr:hover td { background: #f9fafb; }

    .mahasiswa-name { font-weight: 600; color: #111827; font-size: 13px; }
    .mahasiswa-nim  { font-size: 11px; color: #9ca3af; margin-top: 2px; }

    /* Status badges */
    .badge {
        display: inline-flex;
        align-items: center;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }
    .badge-pending  { background: #fff8e1; color: #b45309; border: 1px solid #fde68a; }
    .badge-approved { background: #e6f9f0; color: #16a34a; border: 1px solid #bbf7d0; }
    .badge-rejected { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    /* Action icons */
    .action-btns { display: flex; align-items: center; gap: 8px; }
    .btn-icon {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        background: #fff;
        cursor: pointer;
        transition: all 0.18s;
        padding: 0;
    }
    .btn-icon .material-icons-outlined { font-size: 16px; }
    .btn-icon.view   { color: #6b7280; }
    .btn-icon.view:hover { border-color: #1a5fb4; color: #1a5fb4; background: #e8f0fb; }
    .btn-icon.approve { color: #16a34a; }
    .btn-icon.approve:hover { border-color: #16a34a; background: #e6f9f0; }
    .btn-icon.reject  { color: #dc2626; }
    .btn-icon.reject:hover { border-color: #dc2626; background: #fef2f2; }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #9ca3af;
    }
    .empty-state .material-icons-outlined { font-size: 48px; margin-bottom: 12px; display: block; }
    .empty-state p { font-size: 14px; }

    /* ===== PAGINATION ===== */
    .pagination-wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 20px;
        background: #fff;
        border-top: 1px solid #e5e7eb;
        border-radius: 0 0 14px 14px;
        font-size: 12px;
        color: #6b7280;
    }
    .pagination-wrap .page-links {
        display: flex;
        gap: 6px;
        align-items: center;
    }
    .pagination-wrap .page-links a,
    .pagination-wrap .page-links span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        font-size: 13px;
        color: #374151;
        text-decoration: none;
        transition: all 0.18s;
    }
    .pagination-wrap .page-links a:hover {
        border-color: #1a5fb4;
        color: #1a5fb4;
        background: #e8f0fb;
    }
    .pagination-wrap .page-links span.current,
    .pagination-wrap .page-links .active span {
        background: #1a5fb4;
        color: #fff;
        border-color: #1a5fb4;
    }
    .pagination-wrap .page-links span.disabled { color: #d1d5db; cursor: not-allowed; }

    /* ===== MODAL BASE ===== */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.45);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        padding: 20px;
        backdrop-filter: blur(2px);
    }
    .modal-overlay.open { display: flex; }
    .modal-box {
        background: #fff;
        border-radius: 18px;
        width: 100%;
        max-width: 560px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 20px 60px rgba(0,0,0,0.18);
        animation: modalIn 0.22s ease;
    }
    @keyframes modalIn {
        from { opacity:0; transform: scale(0.95) translateY(10px); }
        to   { opacity:1; transform: scale(1) translateY(0); }
    }
    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px 0;
        margin-bottom: 4px;
    }
    .modal-header-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 700;
        color: #111827;
    }
    .modal-header-title .material-icons-outlined { color: #1a5fb4; font-size: 22px; }
    .modal-close {
        background: none;
        border: none;
        cursor: pointer;
        color: #9ca3af;
        font-size: 20px;
        display: flex;
        align-items: center;
        padding: 4px;
        border-radius: 6px;
        transition: color 0.18s, background 0.18s;
    }
    .modal-close:hover { color: #374151; background: #f3f4f6; }
    .modal-body { padding: 16px 24px 20px; }

    /* Detail modal sections */
    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 700;
        color: #111827;
        margin: 16px 0 12px;
    }
    .section-title::before {
        content: '';
        display: inline-block;
        width: 3px;
        height: 18px;
        background: #1a5fb4;
        border-radius: 2px;
        flex-shrink: 0;
    }
    .info-card {
        background: #f8faff;
        border: 1px solid #e8f0fb;
        border-radius: 12px;
        padding: 16px;
    }
    .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
    .info-field .field-label {
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #9ca3af;
        margin-bottom: 3px;
    }
    .info-field .field-value {
        font-size: 14px;
        font-weight: 500;
        color: #111827;
    }
    .info-field.full { grid-column: 1 / -1; }
    .inline-icon { display: flex; align-items: center; gap: 6px; }
    .inline-icon .material-icons-outlined { font-size: 16px; color: #6b7280; }

    /* Doc badges */
    .doc-list { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 10px; }
    .doc-badge {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 500;
        color: #374151;
        background: #fff;
        cursor: default;
    }
    .doc-badge .material-icons-outlined { font-size: 16px; }
    .doc-badge.pdf { color: #dc2626; }
    .doc-badge.file { color: #1a5fb4; }

    /* Modal footer */
    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 16px 24px;
        border-top: 1px solid #f3f4f6;
    }
    .btn-approve {
        display: flex;
        align-items: center;
        gap: 7px;
        padding: 10px 22px;
        background: #1a5fb4;
        color: #fff;
        border: none;
        border-radius: 24px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
        transition: background 0.18s;
    }
    .btn-approve .material-icons-outlined { font-size: 16px; }
    .btn-approve:hover { background: #1550a0; }
    .btn-reject-outline {
        display: flex;
        align-items: center;
        gap: 7px;
        padding: 10px 22px;
        background: #fff;
        color: #dc2626;
        border: 1.5px solid #dc2626;
        border-radius: 24px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.18s;
    }
    .btn-reject-outline .material-icons-outlined { font-size: 16px; }
    .btn-reject-outline:hover { background: #fef2f2; }

    /* ===== REJECT MODAL ===== */
    .reject-icon-wrap {
        width: 52px;
        height: 52px;
        background: #fef2f2;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }
    .reject-icon-wrap .material-icons-outlined { color: #dc2626; font-size: 26px; }
    .reject-label {
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #6b7280;
        margin-bottom: 4px;
    }
    .reject-modal-title {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 12px;
    }
    .reject-modal-desc { font-size: 13px; color: #6b7280; line-height: 1.6; margin-bottom: 16px; }
    .reject-textarea {
        width: 100%;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 12px 14px;
        font-size: 13px;
        font-family: inherit;
        color: #111827;
        resize: vertical;
        min-height: 100px;
        transition: border-color 0.18s;
        background: #fff;
    }
    .reject-textarea:focus { outline: none; border-color: #1a5fb4; }
    .reject-textarea::placeholder { color: #9ca3af; }
    .reject-chips { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 10px; }
    .reject-chip {
        padding: 6px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 20px;
        font-size: 12px;
        color: #374151;
        background: #fff;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.18s;
    }
    .reject-chip:hover { border-color: #1a5fb4; color: #1a5fb4; background: #e8f0fb; }
    .reject-modal-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        padding: 14px 0 0;
        border-top: 1px solid #f3f4f6;
        margin-top: 16px;
    }
    .btn-cancel {
        background: none;
        border: none;
        font-size: 14px;
        font-family: inherit;
        color: #6b7280;
        cursor: pointer;
        padding: 8px 14px;
        border-radius: 8px;
        transition: background 0.18s;
    }
    .btn-cancel:hover { background: #f3f4f6; }
    .btn-send-reject {
        display: flex;
        align-items: center;
        gap: 7px;
        padding: 10px 22px;
        background: #dc2626;
        color: #fff;
        border: none;
        border-radius: 24px;
        font-size: 13px;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        transition: background 0.18s;
    }
    .btn-send-reject:hover { background: #b91c1c; }
    .btn-send-reject .material-icons-outlined { font-size: 16px; }

    /* Success/Error flash */
    .flash-msg {
        padding: 12px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 18px;
    }
    .flash-msg.success { background: #e6f9f0; color: #15803d; border: 1px solid #bbf7d0; }
    .flash-msg.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
    .flash-msg .material-icons-outlined { font-size: 18px; }

    @media (max-width: 900px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 600px) {
        .stats-grid { grid-template-columns: 1fr 1fr; gap: 10px; }
        .info-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<div class="page-header">
    <div>
        <h1>Verifikasi Data</h1>
        <div class="subtitle">Kelola dan verifikasi seluruh pengajuan mahasiswa sebelum dipublikasikan ke sistem.</div>
    </div>
</div>

{{-- ===== FLASH MESSAGES ===== --}}
@if(session('success'))
<div class="flash-msg success">
    <span class="material-icons-outlined">check_circle</span>
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="flash-msg error">
    <span class="material-icons-outlined">error_outline</span>
    {{ session('error') }}
</div>
@endif

{{-- ===== STATS CARDS ===== --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue"><span class="material-icons-outlined">assignment</span></div>
        <div class="stat-info">
            <div class="label">Total Pengajuan</div>
            <div class="value">{{ $stats['total'] }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon yellow"><span class="material-icons-outlined">pending</span></div>
        <div class="stat-info">
            <div class="label">Pending Review</div>
            <div class="value">{{ $stats['pending'] }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><span class="material-icons-outlined">check_circle</span></div>
        <div class="stat-info">
            <div class="label">Disetujui</div>
            <div class="value">{{ $stats['approved'] }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon red"><span class="material-icons-outlined">cancel</span></div>
        <div class="stat-info">
            <div class="label">Ditolak</div>
            <div class="value">{{ $stats['rejected'] }}</div>
        </div>
    </div>
</div>

{{-- ===== TABS ===== --}}
<div class="card" style="overflow: hidden;">
    <div style="padding: 0 24px;">
        <div class="tabs-bar">
            <button class="tab-btn {{ $tab === 'kpmagang' ? 'active' : '' }}" data-tab="kpmagang">
                Pengajuan KP/Magang
            </button>
            <button class="tab-btn {{ $tab === 'tugasakhir' ? 'active' : '' }}" data-tab="tugasakhir">
                Pengajuan Tugas Akhir
            </button>
        </div>
    </div>

    {{-- ====== TAB 1: KP/MAGANG ====== --}}
    <div class="tab-content {{ $tab === 'kpmagang' ? 'active' : '' }}" id="tab-kpmagang">
        <div style="padding: 0 24px 20px;">
            {{-- Toolbar --}}
            <form method="GET" action="{{ route('admin.verifikasi.index') }}" id="form-kp">
                <input type="hidden" name="tab" value="kpmagang">
                <div class="toolbar">
                    <div class="search-wrap">
                        <span class="material-icons-outlined">search</span>
                        <input type="text" name="search" value="{{ $tab === 'kpmagang' ? $search : '' }}"
                               class="search-input" placeholder="Cari nama mahasiswa..."
                               onchange="this.form.submit()">
                    </div>
                    <select name="jenis" class="select-filter" onchange="this.form.submit()">
                        <option value="">Semua Jenis</option>
                        <option value="Magang">Magang</option>
                        <option value="Kerja Praktek">Kerja Praktek</option>
                    </select>
                </div>
            </form>
        </div>

        {{-- Table --}}
        <div style="overflow-x: auto;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama & NIM</th>
                        <th>Perusahaan</th>
                        <th>Posisi</th>
                        <th>Periode</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kpList as $kp)
                    <tr>
                        <td>
                            <div class="mahasiswa-name">{{ $kp->nama }}</div>
                            <div class="mahasiswa-nim">{{ $kp->angkatan ?? '-' }}</div>
                        </td>
                        <td>{{ $kp->perusahaan->nama ?? '-' }}</td>
                        <td>{{ $kp->posisi ?? '-' }}</td>
                        <td>{{ $kp->periode ?? '-' }}</td>
                        <td>{{ $kp->created_at ? $kp->created_at->format('d M Y') : '-' }}</td>
                        <td>
                            <div class="action-btns">
                                <button class="btn-icon view" title="Lihat Detail"
                                    onclick="openKpModal({{ json_encode([
                                        'nama'       => $kp->nama,
                                        'angkatan'   => $kp->angkatan,
                                        'posisi'     => $kp->posisi,
                                        'periode'    => $kp->periode,
                                        'perusahaan' => $kp->perusahaan->nama ?? '-',
                                        'jenis'      => $kp->perusahaan->jenis_kegiatan ?? 'KP/Magang',
                                        'tanggal'    => $kp->created_at ? $kp->created_at->format('d M Y') : '-',
                                    ]) }})">
                                    <span class="material-icons-outlined">visibility</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <span class="material-icons-outlined">inbox</span>
                                <p>Belum ada data KP/Magang</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($kpList->total() > 0)
        <div class="pagination-wrap">
            <span>Menampilkan {{ $kpList->firstItem() }}-{{ $kpList->lastItem() }} dari {{ $kpList->total() }} data KP/Magang</span>
            <div class="page-links">
                @if($kpList->onFirstPage())
                    <span class="disabled"><span class="material-icons-outlined" style="font-size:14px;">chevron_left</span></span>
                @else
                    <a href="{{ $kpList->previousPageUrl() }}&tab=kpmagang{{ $search ? '&search='.$search : '' }}">
                        <span class="material-icons-outlined" style="font-size:14px;">chevron_left</span>
                    </a>
                @endif
                @foreach($kpList->getUrlRange(1, $kpList->lastPage()) as $page => $url)
                    @if($page == $kpList->currentPage())
                        <span class="current">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}&tab=kpmagang{{ $search ? '&search='.$search : '' }}">{{ $page }}</a>
                    @endif
                @endforeach
                @if($kpList->hasMorePages())
                    <a href="{{ $kpList->nextPageUrl() }}&tab=kpmagang{{ $search ? '&search='.$search : '' }}">
                        <span class="material-icons-outlined" style="font-size:14px;">chevron_right</span>
                    </a>
                @else
                    <span class="disabled"><span class="material-icons-outlined" style="font-size:14px;">chevron_right</span></span>
                @endif
            </div>
        </div>
        @endif
    </div>

    {{-- ====== TAB 2: TUGAS AKHIR ====== --}}
    <div class="tab-content {{ $tab === 'tugasakhir' ? 'active' : '' }}" id="tab-tugasakhir">
        <div style="padding: 0 24px 20px;">
            {{-- Toolbar --}}
            <form method="GET" action="{{ route('admin.verifikasi.index') }}" id="form-ta">
                <input type="hidden" name="tab" value="tugasakhir">
                <div class="toolbar">
                    <div class="search-wrap">
                        <span class="material-icons-outlined">search</span>
                        <input type="text" name="search" value="{{ $tab === 'tugasakhir' ? $search : '' }}"
                               class="search-input" placeholder="Cari nama atau judul TA..."
                               onchange="this.form.submit()">
                    </div>
                    <select name="status" class="select-filter" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="pending"  {{ ($tab === 'tugasakhir' && $filterStatus === 'pending')  ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ ($tab === 'tugasakhir' && $filterStatus === 'approved') ? 'selected' : '' }}>Disetujui</option>
                        <option value="rejected" {{ ($tab === 'tugasakhir' && $filterStatus === 'rejected') ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
            </form>
        </div>

        {{-- Table --}}
        <div style="overflow-x: auto;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama & NIM</th>
                        <th>Judul Tugas Akhir</th>
                        <th>Tanggal Submit</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($taList as $ta)
                    <tr>
                        <td>
                            <div class="mahasiswa-name">{{ $ta->student->nama_lengkap ?? '-' }}</div>
                            <div class="mahasiswa-nim">{{ $ta->student->nim ?? '-' }}</div>
                        </td>
                        <td style="max-width:260px;">
                            <div style="font-weight:500; line-height:1.4;">{{ $ta->title }}</div>
                        </td>
                        <td>{{ $ta->submitted_at ? \Carbon\Carbon::parse($ta->submitted_at)->format('d M Y') : '-' }}</td>
                        <td>
                            @if($ta->status === 'pending')
                                <span class="badge badge-pending">Pending Review</span>
                            @elseif($ta->status === 'approved')
                                <span class="badge badge-approved">Disetujui</span>
                            @elseif($ta->status === 'rejected')
                                <span class="badge badge-rejected">Ditolak</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-btns">
                                <button class="btn-icon view" title="Lihat Detail"
                                    onclick="openTaModal({{ json_encode([
                                        'id'       => $ta->id,
                                        'nama'     => $ta->student->nama_lengkap ?? '-',
                                        'nim'      => $ta->student->nim ?? '-',
                                        'angkatan' => $ta->student->angkatan ?? '-',
                                        'title'    => $ta->title,
                                        'status'   => $ta->status,
                                        'submitted_at' => $ta->submitted_at ? \Carbon\Carbon::parse($ta->submitted_at)->format('d M Y') : '-',
                                    ]) }})">
                                    <span class="material-icons-outlined">visibility</span>
                                </button>
                                @if($ta->status === 'pending')
                                <form method="POST" action="{{ route('admin.verifikasi.approve_ta', $ta->id) }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn-icon approve" title="Setujui"
                                        onclick="return confirm('Setujui pengajuan ini?')">
                                        <span class="material-icons-outlined">check_circle</span>
                                    </button>
                                </form>
                                <button class="btn-icon reject" title="Tolak"
                                    onclick="openRejectModal({{ $ta->id }}, '{{ addslashes($ta->title) }}')">
                                    <span class="material-icons-outlined">cancel</span>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <span class="material-icons-outlined">inbox</span>
                                <p>Belum ada pengajuan Tugas Akhir</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($taList->total() > 0)
        <div class="pagination-wrap">
            <span>Menampilkan {{ $taList->firstItem() }}-{{ $taList->lastItem() }} dari {{ $taList->total() }} pengajuan</span>
            <div class="page-links">
                @if($taList->onFirstPage())
                    <span class="disabled"><span class="material-icons-outlined" style="font-size:14px;">chevron_left</span></span>
                @else
                    <a href="{{ $taList->previousPageUrl() }}&tab=tugasakhir{{ $search ? '&search='.$search : '' }}{{ $filterStatus ? '&status='.$filterStatus : '' }}">
                        <span class="material-icons-outlined" style="font-size:14px;">chevron_left</span>
                    </a>
                @endif
                @foreach($taList->getUrlRange(1, $taList->lastPage()) as $page => $url)
                    @if($page == $taList->currentPage())
                        <span class="current">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}&tab=tugasakhir{{ $search ? '&search='.$search : '' }}{{ $filterStatus ? '&status='.$filterStatus : '' }}">{{ $page }}</a>
                    @endif
                @endforeach
                @if($taList->hasMorePages())
                    <a href="{{ $taList->nextPageUrl() }}&tab=tugasakhir{{ $search ? '&search='.$search : '' }}{{ $filterStatus ? '&status='.$filterStatus : '' }}">
                        <span class="material-icons-outlined" style="font-size:14px;">chevron_right</span>
                    </a>
                @else
                    <span class="disabled"><span class="material-icons-outlined" style="font-size:14px;">chevron_right</span></span>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>

{{-- ===== MODAL: DETAIL KP/MAGANG ===== --}}
<div class="modal-overlay" id="modal-kp">
    <div class="modal-box">
        <div class="modal-header">
            <div class="modal-header-title">
                <span class="material-icons-outlined">assignment</span>
                Detail Pengajuan KP/Magang
            </div>
            <button class="modal-close" onclick="closeModal('modal-kp')">
                <span class="material-icons-outlined">close</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="section-title">Data Mahasiswa</div>
            <div class="info-card">
                <div class="info-grid">
                    <div class="info-field">
                        <div class="field-label">Nama Lengkap</div>
                        <div class="field-value" id="kp-nama">—</div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Angkatan</div>
                        <div class="field-value" id="kp-angkatan">—</div>
                    </div>
                    <div class="info-field full">
                        <div class="field-label">Posisi</div>
                        <div class="field-value" id="kp-posisi">—</div>
                    </div>
                </div>
            </div>

            <div class="section-title">Data Kegiatan</div>
            <div class="info-card">
                <div class="info-grid">
                    <div class="info-field">
                        <div class="field-label">Jenis Kegiatan</div>
                        <div class="field-value inline-icon">
                            <span class="material-icons-outlined">work_outline</span>
                            <span id="kp-jenis">—</span>
                        </div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Perusahaan</div>
                        <div class="field-value inline-icon">
                            <span class="material-icons-outlined">business</span>
                            <span id="kp-perusahaan">—</span>
                        </div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Periode Kegiatan</div>
                        <div class="field-value inline-icon">
                            <span class="material-icons-outlined">calendar_month</span>
                            <span id="kp-periode">—</span>
                        </div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Tanggal Pengajuan</div>
                        <div class="field-value" id="kp-tanggal">—</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal('modal-kp')">Tutup</button>
        </div>
    </div>
</div>

{{-- ===== MODAL: DETAIL TUGAS AKHIR ===== --}}
<div class="modal-overlay" id="modal-ta">
    <div class="modal-box">
        <div class="modal-header">
            <div class="modal-header-title">
                <span class="material-icons-outlined">menu_book</span>
                Detail Pengajuan Tugas Akhir
            </div>
            <button class="modal-close" onclick="closeModal('modal-ta')">
                <span class="material-icons-outlined">close</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="section-title">Data Mahasiswa</div>
            <div class="info-card">
                <div class="info-grid">
                    <div class="info-field">
                        <div class="field-label">Nama Lengkap</div>
                        <div class="field-value" id="ta-nama">—</div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">NIM</div>
                        <div class="field-value" id="ta-nim">—</div>
                    </div>
                    <div class="info-field full">
                        <div class="field-label">Angkatan</div>
                        <div class="field-value" id="ta-angkatan">—</div>
                    </div>
                </div>
            </div>

            <div class="section-title">Data Pengajuan</div>
            <div class="info-card">
                <div class="info-grid">
                    <div class="info-field full">
                        <div class="field-label">Judul Tugas Akhir</div>
                        <div class="field-value" id="ta-title">—</div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Tanggal Submit</div>
                        <div class="field-value inline-icon">
                            <span class="material-icons-outlined">calendar_month</span>
                            <span id="ta-submitted">—</span>
                        </div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Status</div>
                        <div class="field-value" id="ta-status-badge">—</div>
                    </div>
                </div>
            </div>

            <div class="section-title">Dokumen Pendukung</div>
            <div class="doc-list">
                <div class="doc-badge pdf">
                    <span class="material-icons-outlined">picture_as_pdf</span>
                    Proposal_TA.pdf
                    <span class="material-icons-outlined" style="font-size:14px;color:#9ca3af;">file_download</span>
                </div>
                <div class="doc-badge file">
                    <span class="material-icons-outlined">description</span>
                    Transkrip_Nilai.pdf
                    <span class="material-icons-outlined" style="font-size:14px;color:#9ca3af;">file_download</span>
                </div>
            </div>
        </div>
        <div class="modal-footer" id="ta-modal-actions">
            {{-- filled dynamically --}}
        </div>
    </div>
</div>

{{-- ===== MODAL: TOLAK PENGAJUAN ===== --}}
<div class="modal-overlay" id="modal-reject">
    <div class="modal-box" style="max-width:480px;">
        <div class="modal-body" style="padding-top:24px;">
            <div class="reject-icon-wrap">
                <span class="material-icons-outlined">error_outline</span>
            </div>
            <div class="reject-label">VERIFIKASI KEAMANAN</div>
            <div class="reject-modal-title">Tolak Pengajuan</div>
            <div class="reject-modal-desc">
                Silakan berikan alasan penolakan agar mahasiswa dapat memperbaiki pengajuan mereka.
                Informasi ini akan dikirimkan langsung ke dashboard mahasiswa.
            </div>
            <form method="POST" id="reject-form">
                @csrf
                <div style="font-size:13px;font-weight:600;color:#374151;margin-bottom:8px;">Alasan Penolakan</div>
                <textarea name="catatan" id="reject-reason" class="reject-textarea"
                    placeholder="Contoh: Dokumen tidak lengkap atau Perusahaan belum terdaftar..."></textarea>
                <div class="reject-chips">
                    <button type="button" class="reject-chip" onclick="addChip(this)">Dokumen tidak lengkap</button>
                    <button type="button" class="reject-chip" onclick="addChip(this)">Perusahaan belum terdaftar</button>
                    <button type="button" class="reject-chip" onclick="addChip(this)">Data tidak sesuai</button>
                </div>
                <div class="reject-modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modal-reject')">Batal</button>
                    <button type="submit" class="btn-send-reject">
                        <span class="material-icons-outlined">send</span>
                        Kirim Penolakan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // ── Tab switching ──────────────────────────────────────────────────
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const tab = this.dataset.tab;
            // Update URL param without reload
            const url = new URL(window.location.href);
            url.searchParams.set('tab', tab);
            url.searchParams.delete('search');
            url.searchParams.delete('status');
            url.searchParams.delete('kp_page');
            url.searchParams.delete('ta_page');
            window.location.href = url.toString();
        });
    });

    // ── Modal helpers ─────────────────────────────────────────────────
    function closeModal(id) {
        document.getElementById(id).classList.remove('open');
    }
    // close on backdrop click
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === this) closeModal(this.id);
        });
    });
    // close on Escape
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') document.querySelectorAll('.modal-overlay.open').forEach(m => m.classList.remove('open'));
    });

    // ── KP/Magang detail modal ────────────────────────────────────────
    function openKpModal(data) {
        document.getElementById('kp-nama').textContent      = data.nama      || '—';
        document.getElementById('kp-angkatan').textContent  = data.angkatan  || '—';
        document.getElementById('kp-posisi').textContent    = data.posisi    || '—';
        document.getElementById('kp-jenis').textContent     = data.jenis     || '—';
        document.getElementById('kp-perusahaan').textContent= data.perusahaan|| '—';
        document.getElementById('kp-periode').textContent   = data.periode   || '—';
        document.getElementById('kp-tanggal').textContent   = data.tanggal   || '—';
        document.getElementById('modal-kp').classList.add('open');
    }

    // ── Tugas Akhir detail modal ──────────────────────────────────────
    function openTaModal(data) {
        document.getElementById('ta-nama').textContent      = data.nama      || '—';
        document.getElementById('ta-nim').textContent       = data.nim       || '—';
        document.getElementById('ta-angkatan').textContent  = data.angkatan  || '—';
        document.getElementById('ta-title').textContent     = data.title     || '—';
        document.getElementById('ta-submitted').textContent = data.submitted_at || '—';

        // status badge
        const badgeMap = {
            pending:  '<span class="badge badge-pending">Pending Review</span>',
            approved: '<span class="badge badge-approved">Disetujui</span>',
            rejected: '<span class="badge badge-rejected">Ditolak</span>',
        };
        document.getElementById('ta-status-badge').innerHTML = badgeMap[data.status] || data.status;

        // action buttons — only show Setujui/Tolak if pending
        const actionsEl = document.getElementById('ta-modal-actions');
        if (data.status === 'pending') {
            actionsEl.innerHTML = `
                <button class="btn-reject-outline" onclick="closeModal('modal-ta'); openRejectModal(${data.id}, '${escapeJs(data.title)}')">
                    <span class="material-icons-outlined">close</span> Tolak
                </button>
                <form method="POST" action="/admin/verifikasi/ta/${data.id}/approve" style="display:inline;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn-approve" onclick="return confirm('Setujui pengajuan ini?')">
                        <span class="material-icons-outlined">check</span> Setujui
                    </button>
                </form>`;
        } else {
            actionsEl.innerHTML = `<button class="btn-cancel" onclick="closeModal('modal-ta')">Tutup</button>`;
        }

        document.getElementById('modal-ta').classList.add('open');
    }

    // ── Reject modal ─────────────────────────────────────────────────
    function openRejectModal(id, title) {
        document.getElementById('reject-reason').value = '';
        document.getElementById('reject-form').action = `/admin/verifikasi/ta/${id}/reject`;
        document.getElementById('modal-reject').classList.add('open');
    }

    function addChip(btn) {
        const ta = document.getElementById('reject-reason');
        if (ta.value) ta.value += ', ';
        ta.value += btn.textContent.trim();
        ta.focus();
    }

    function escapeJs(str) {
        return (str || '').replace(/'/g, "\\'").replace(/"/g, '\\"');
    }
</script>
@endsection
