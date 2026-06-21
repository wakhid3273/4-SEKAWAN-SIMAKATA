@extends('layouts.admin')

@section('title', 'Verifikasi Data')

@section('extra_styles')
<style>
    /* ===== PREMIUM STAT CARDS ===== */
    .stats-card-group {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 24px;
    }
    .stat-card-v {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        /* Premium Enhancement */
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    /* Accent Line */
    .stat-card-v::before {
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
    .stat-card-v:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1), 0 2px 6px rgba(0, 0, 0, 0.06);
        border-color: #d1d5db;
    }
    
    .stat-card-v:hover::before {
        opacity: 1;
    }
    
    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        transition: all 0.3s ease;
    }
    
    /* Icon Animation on Hover */
    .stat-card-v:hover .stat-icon {
        transform: scale(1.1);
    }
    
    .icon-blue { background: #e8f0fb; color: #1a5fb4; }
    .icon-amber { background: #fef3c7; color: #d97706; }
    .icon-green { background: #dcfce7; color: #15803d; }
    .icon-red { background: #fee2e2; color: #dc2626; }
    
    /* Set accent color per card */
    .stat-card-v:nth-child(1)::before { color: #1a5fb4; }
    .stat-card-v:nth-child(2)::before { color: #d97706; }
    .stat-card-v:nth-child(3)::before { color: #15803d; }
    .stat-card-v:nth-child(4)::before { color: #dc2626; }
    
    .stat-info-v .stat-title {
        font-size: 12px;
        color: #6b7280;
        font-weight: 600;
        margin-bottom: 4px;
        transition: color 0.3s ease;
    }
    
    .stat-card-v:hover .stat-title {
        color: #1a5fb4;
    }
    
    .stat-info-v .stat-value {
        font-size: 24px;
        font-weight: 800;
        color: #111827;
        line-height: 1;
        transition: all 0.3s ease;
    }
    
    /* Number Emphasis on Hover */
    .stat-card-v:hover .stat-value {
        transform: scale(1.02);
        transform-origin: left;
    }

    .tabs {
        display: flex;
        gap: 24px;
        border-bottom: 2px solid #e5e7eb;
        margin-bottom: 20px;
    }
    .tab-item {
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 600;
        color: #6b7280;
        text-decoration: none;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        transition: all 0.2s;
    }
    .tab-item:hover {
        color: #1a5fb4;
    }
    .tab-item.active {
        color: #1a5fb4;
        border-bottom-color: #1a5fb4;
    }

    .filter-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        gap: 16px;
        flex-wrap: wrap;
    }
    .search-box {
        display: flex;
        align-items: center;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 8px 16px;
        width: 300px;
    }
    .search-box input {
        border: none;
        outline: none;
        width: 100%;
        margin-left: 8px;
        font-size: 13px;
    }
    .filter-actions {
        display: flex;
        gap: 12px;
    }
    .filter-select {
        padding: 8px 16px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background: white;
        font-size: 13px;
        color: #374151;
        outline: none;
        cursor: pointer;
    }

    /* ===== PREMIUM TABLE CONTAINER ===== */
    .table-container {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Subtle Hover on Table Container */
    .table-container:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08), 0 2px 4px rgba(0, 0, 0, 0.04);
        border-color: #d1d5db;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th {
        background: #f8fafc;
        padding: 14px 20px;
        text-align: left;
        font-size: 11px;
        font-weight: 700;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid #e5e7eb;
    }
    td {
        padding: 16px 20px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }
    tr:last-child td { border-bottom: none; }
    
    .cell-nama-nim { display: flex; flex-direction: column; gap: 4px; }
    .cell-nama { font-weight: 600; color: #111827; }
    .cell-nim { font-size: 11px; color: #6b7280; }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 4px 10px;
        border-radius: 99px;
        font-size: 11px;
        font-weight: 600;
    }
    .status-pending { background: #fef3c7; color: #d97706; }
    .status-approved { background: #dcfce7; color: #15803d; }
    .status-rejected { background: #fee2e2; color: #dc2626; }

    .action-buttons {
        display: flex;
        gap: 8px;
    }
    .action-btn {
        width: 28px;
        height: 28px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        background: #f3f4f6;
        color: #6b7280;
        transition: all 0.2s;
    }
    .action-btn.view:hover { background: #e8f0fb; color: #1a5fb4; }
    .action-btn.approve:hover { background: #dcfce7; color: #15803d; }
    .action-btn.reject:hover { background: #fee2e2; color: #dc2626; }
    .action-btn .material-icons-outlined { font-size: 16px; }

    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 20px;
        background: white;
        border-top: 1px solid #e5e7eb;
    }
    .pagination-info {
        font-size: 13px;
        color: #6b7280;
    }
    .pagination-info strong {
        color: #111827;
        font-weight: 700;
    }
    
    .pagination-links {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .pagination-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 12px;
        border: 1px solid #e5e7eb;
        background: #ffffff;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .pagination-btn:hover:not(.disabled):not(.active) {
        background: #f9fafb;
        border-color: #1a5fb4;
        color: #1a5fb4;
    }
    .pagination-btn.active {
        background: #1a5fb4;
        border-color: #1a5fb4;
        color: #ffffff;
    }
    .pagination-btn.disabled {
        opacity: 0.4;
        cursor: not-allowed;
        pointer-events: none;
    }
    .pagination-btn .material-icons-outlined {
        font-size: 18px;
    }
    
    @media (max-width: 768px) {
        .pagination-container {
            flex-direction: column;
            gap: 12px;
            align-items: flex-start;
        }
        .pagination-links {
            width: 100%;
            justify-content: center;
        }
    }
    
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1>Verifikasi Data</h1>
        <p class="subtitle">Kelola dan verifikasi seluruh pengajuan mahasiswa sebelum dipublikasikan ke sistem.</p>
    </div>
</div>

<div class="stats-card-group">
    <div class="stat-card-v">
        <div class="stat-icon icon-blue"><span class="material-icons-outlined">description</span></div>
        <div class="stat-info-v">
            <div class="stat-title">Total Pengajuan</div>
            <div class="stat-value">{{ $totalPengajuan }}</div>
        </div>
    </div>
    <div class="stat-card-v">
        <div class="stat-icon icon-amber"><span class="material-icons-outlined">pending_actions</span></div>
        <div class="stat-info-v">
            <div class="stat-title">Pending Review</div>
            <div class="stat-value">{{ $pendingReview }}</div>
        </div>
    </div>
    <div class="stat-card-v">
        <div class="stat-icon icon-green"><span class="material-icons-outlined">check_circle</span></div>
        <div class="stat-info-v">
            <div class="stat-title">Disetujui</div>
            <div class="stat-value">{{ $disetujui }}</div>
        </div>
    </div>
    <div class="stat-card-v">
        <div class="stat-icon icon-red"><span class="material-icons-outlined">cancel</span></div>
        <div class="stat-info-v">
            <div class="stat-title">Ditolak</div>
            <div class="stat-value">{{ $ditolak }}</div>
        </div>
    </div>
</div>

<div class="table-container">
    <div style="padding: 20px;">
        <div class="tabs">
            <a href="?tab=kp_magang" class="tab-item {{ $tab === 'kp_magang' ? 'active' : '' }}">Pengajuan KP/Magang</a>
            <a href="?tab=ta" class="tab-item {{ $tab === 'ta' ? 'active' : '' }}">Pengajuan Tugas Akhir</a>
        </div>

        <form class="filter-bar" method="GET">
            <input type="hidden" name="tab" value="{{ $tab }}">
            <div class="search-box">
                <span class="material-icons-outlined" style="color:#9ca3af; font-size:18px;">search</span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau NIM...">
            </div>
            <div class="filter-actions">
                <select name="status" class="filter-select" onchange="this.form.submit()">
                    <option value="Semua Status" {{ request('status') === 'Semua Status' ? 'selected' : '' }}>Semua Status</option>
                    <option value="Pending Review" {{ request('status') === 'Pending Review' ? 'selected' : '' }}>Pending Review</option>
                    <option value="Disetujui" {{ request('status') === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Ditolak" {{ request('status') === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
                @if($tab === 'kp_magang')
                <select name="kegiatan" class="filter-select" onchange="this.form.submit()">
                    <option value="">Jenis Kegiatan</option>
                    <option value="Kerja Praktek" {{ request('kegiatan') === 'Kerja Praktek' ? 'selected' : '' }}>Kerja Praktek</option>
                    <option value="Magang" {{ request('kegiatan') === 'Magang' ? 'selected' : '' }}>Magang</option>
                </select>
                @endif
            </div>
        </form>

        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>NAMA & NIM</th>
                        @if($tab === 'kp_magang')
                            <th>KEGIATAN</th>
                            <th>PERUSAHAAN</th>
                            <th>PERIODE</th>
                        @else
                            <th>JUDUL TA</th>
                        @endif
                        <th>TANGGAL</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengajuan as $item)
                        <tr>
                            <td>
                                <div class="cell-nama-nim">
                                    <div class="cell-nama">{{ $tab === 'kp_magang' ? $item->nama : ($item->student->nama_lengkap ?? 'N/A') }}</div>
                                    <div class="cell-nim">{{ $tab === 'kp_magang' ? $item->nim : ($item->student->nim ?? 'N/A') }}</div>
                                </div>
                            </td>
                            @if($tab === 'kp_magang')
                                <td>{{ $item->kegiatan ?? 'Kerja Praktek' }}</td>
                                <td>{{ $item->perusahaan->nama ?? 'N/A' }}</td>
                                <td>{{ $item->periode ?? 'N/A' }}</td>
                                <td>{{ $item->created_at ? $item->created_at->format('d M Y') : 'N/A' }}</td>
                                <td>
                                    @php
                                        $statusLabel = 'Pending Review';
                                        $statusClass = 'status-pending';
                                        if($item->status === 'approved' || $item->status === 'Disetujui') { 
                                            $statusLabel = 'Disetujui'; 
                                            $statusClass = 'status-approved'; 
                                        }
                                        if($item->status === 'rejected' || $item->status === 'Ditolak') { 
                                            $statusLabel = 'Ditolak'; 
                                            $statusClass = 'status-rejected'; 
                                        }
                                        if($item->status === 'pending' || $item->status === 'Pending Review') {
                                            $statusLabel = 'Pending Review';
                                            $statusClass = 'status-pending';
                                        }
                                    @endphp
                                    <span class="status-badge {{ $statusClass }}">{{ $statusLabel }}</span>
                                </td>
                            @else
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->submitted_at ? \Carbon\Carbon::parse($item->submitted_at)->format('d M Y') : 'N/A' }}</td>
                                <td>
                                    @php
                                        $statusLabel = 'Pending Review';
                                        $statusClass = 'status-pending';
                                        if($item->status === 'approved') { $statusLabel = 'Disetujui'; $statusClass = 'status-approved'; }
                                        if($item->status === 'rejected') { $statusLabel = 'Ditolak'; $statusClass = 'status-rejected'; }
                                    @endphp
                                    <span class="status-badge {{ $statusClass }}">{{ $statusLabel }}</span>
                                </td>
                            @endif
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn view" title="Lihat Detail" onclick="openDetailModal({{ $item->id }}, '{{ $tab }}')"><span class="material-icons-outlined">visibility</span></button>
                                    @if(($tab === 'kp_magang' && ($item->status === 'pending' || $item->status === 'Pending Review')) || ($tab === 'ta' && $item->status === 'pending'))
                                        <button class="action-btn approve" title="Setujui" onclick="approvePengajuan({{ $item->id }}, '{{ $tab }}')"><span class="material-icons-outlined">check_circle</span></button>
                                        <button class="action-btn reject" title="Tolak" onclick="openRejectModal({{ $item->id }}, '{{ $tab }}')"><span class="material-icons-outlined">cancel</span></button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; padding: 40px; color: #6b7280;">Tidak ada data pengajuan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="pagination-container">
        <div class="pagination-info">
            Showing <strong>{{ $pengajuan->firstItem() ?? 0 }}-{{ $pengajuan->lastItem() ?? 0 }}</strong> of <strong>{{ $pengajuan->total() }}</strong> results
        </div>
        <div class="pagination-links">
            {{-- Previous Button --}}
            @if ($pengajuan->onFirstPage())
                <span class="pagination-btn disabled">
                    <span class="material-icons-outlined">chevron_left</span>
                </span>
            @else
                <a href="{{ $pengajuan->appends(request()->except('page'))->previousPageUrl() }}" class="pagination-btn">
                    <span class="material-icons-outlined">chevron_left</span>
                </a>
            @endif

            {{-- Page Numbers --}}
            @php
                $start = max($pengajuan->currentPage() - 2, 1);
                $end = min($start + 4, $pengajuan->lastPage());
                $start = max($end - 4, 1);
            @endphp

            @if($start > 1)
                <a href="{{ $pengajuan->appends(request()->except('page'))->url(1) }}" class="pagination-btn">1</a>
                @if($start > 2)
                    <span class="pagination-btn disabled">...</span>
                @endif
            @endif

            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $pengajuan->currentPage())
                    <span class="pagination-btn active">{{ $i }}</span>
                @else
                    <a href="{{ $pengajuan->appends(request()->except('page'))->url($i) }}" class="pagination-btn">{{ $i }}</a>
                @endif
            @endfor

            @if($end < $pengajuan->lastPage())
                @if($end < $pengajuan->lastPage() - 1)
                    <span class="pagination-btn disabled">...</span>
                @endif
                <a href="{{ $pengajuan->appends(request()->except('page'))->url($pengajuan->lastPage()) }}" class="pagination-btn">{{ $pengajuan->lastPage() }}</a>
            @endif

            {{-- Next Button --}}
            @if ($pengajuan->hasMorePages())
                <a href="{{ $pengajuan->appends(request()->except('page'))->nextPageUrl() }}" class="pagination-btn">
                    <span class="material-icons-outlined">chevron_right</span>
                </a>
            @else
                <span class="pagination-btn disabled">
                    <span class="material-icons-outlined">chevron_right</span>
                </span>
            @endif
        </div>
    </div>
</div>

{{-- MODALS --}}
<style>
    .modal-overlay {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.5); z-index: 1000;
        display: none; justify-content: center; align-items: center;
    }
    .modal-card {
        background: white; border-radius: 12px;
        width: 100%; max-width: 600px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .modal-header {
        padding: 20px; border-bottom: 1px solid #e5e7eb;
        display: flex; justify-content: space-between; align-items: center;
    }
    .modal-header h2 { font-size: 16px; font-weight: 700; display: flex; align-items: center; gap: 8px; }
    .modal-close { background: none; border: none; cursor: pointer; color: #6b7280; }
    .modal-body { padding: 20px; max-height: 70vh; overflow-y: auto; }
    .modal-footer {
        padding: 20px; border-top: 1px solid #e5e7eb;
        display: flex; justify-content: flex-end; gap: 12px; background: #f8fafc; border-radius: 0 0 12px 12px;
    }
    
    /* Section inside Detail Modal */
    .detail-section { margin-bottom: 24px; }
    .detail-section-title {
        font-size: 13px; font-weight: 700; color: #111827;
        margin-bottom: 12px; display: flex; align-items: center; gap: 8px;
        border-left: 3px solid #1a5fb4; padding-left: 8px;
    }
    .detail-grid {
        display: grid; grid-template-columns: 1fr 1fr; gap: 16px;
        background: #f8fafc; padding: 16px; border-radius: 8px;
    }
    .detail-item .label { font-size: 10px; color: #6b7280; font-weight: 600; text-transform: uppercase; margin-bottom: 4px; }
    .detail-item .val { font-size: 13px; color: #111827; font-weight: 500; }
    .doc-btn {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px;
        font-size: 12px; font-weight: 600; color: #374151; text-decoration: none;
        background: white;
    }
    .btn-outline { padding: 8px 16px; border: 1px solid #e5e7eb; background: white; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 13px; }
    .btn-primary { padding: 8px 16px; border: none; background: #1a5fb4; color: white; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 13px; }
    .btn-danger { padding: 8px 16px; border: none; background: #dc2626; color: white; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 13px; display: inline-flex; align-items: center; gap: 6px; }

    /* Reject modal specifics */
    .reject-modal-card { max-width: 400px; text-align: center; }
    .reject-icon-wrap {
        width: 48px; height: 48px; border-radius: 50%; background: #fee2e2; color: #dc2626;
        display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;
    }
    .reject-textarea { width: 100%; height: 100px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; margin-top: 16px; font-family: inherit; font-size: 13px; resize: none; }
    .reject-tags { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 12px; justify-content: center; }
    .reject-tag { padding: 4px 10px; background: #e8f0fb; color: #1a5fb4; border-radius: 99px; font-size: 11px; cursor: pointer; font-weight: 500; }
</style>

{{-- Detail Modal --}}
<div class="modal-overlay" id="detailModal">
    <div class="modal-card">
        <div class="modal-header">
            <h2><span class="material-icons-outlined" style="color:#1a5fb4;">description</span> Detail Pengajuan KP/Magang</h2>
            <button class="modal-close" onclick="closeModal('detailModal')"><span class="material-icons-outlined">close</span></button>
        </div>
        <div class="modal-body" id="detailModalBody">
            Loading...
        </div>
        <div class="modal-footer" id="detailModalFooter">
            <button class="btn-danger" style="background:white; color:#dc2626; border:1px solid #fca5a5;"><span class="material-icons-outlined" style="font-size:16px;">close</span> Tolak</button>
            <button class="btn-primary" style="display:inline-flex; align-items:center; gap:6px;"><span class="material-icons-outlined" style="font-size:16px;">check</span> Setujui</button>
        </div>
    </div>
</div>

{{-- Reject Modal --}}
<div class="modal-overlay" id="rejectModal">
    <div class="modal-card reject-modal-card">
        <div class="modal-body" style="padding: 32px 24px;">
            <div class="reject-icon-wrap">
                <span class="material-icons-outlined" style="font-size:24px;">error_outline</span>
            </div>
            <h2 style="font-size:18px; font-weight:700; margin-bottom:8px;">Tolak Pengajuan</h2>
            <p style="font-size:12px; color:#6b7280; line-height:1.5;">Silakan berikan alasan penolakan agar mahasiswa dapat memperbaiki pengajuan mereka. Informasi ini akan dikirimkan ke dashboard mahasiswa.</p>
            
            <form id="rejectForm" onsubmit="submitReject(event)">
                <input type="hidden" id="rejectId">
                <input type="hidden" id="rejectTab">
                <textarea class="reject-textarea" id="alasan_penolakan" placeholder="Contoh: Dokumen tidak lengkap atau Perusahaan belum terdaftar..." required></textarea>
                
                <div class="reject-tags">
                    <div class="reject-tag" onclick="fillReject('Dokumen tidak lengkap')">Dokumen tidak lengkap</div>
                    <div class="reject-tag" onclick="fillReject('Perusahaan belum terdaftar')">Perusahaan belum terdaftar</div>
                </div>

                <div style="display:flex; justify-content:center; gap:12px; margin-top:24px;">
                    <button type="button" class="btn-outline" onclick="closeModal('rejectModal')">Batal</button>
                    <button type="submit" class="btn-danger">Kirim Penolakan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(id) { document.getElementById(id).style.display = 'flex'; }
    function closeModal(id) { document.getElementById(id).style.display = 'none'; }
    
    function fillReject(text) {
        document.getElementById('alasan_penolakan').value = text;
    }

    async function openDetailModal(id, tab) {
        openModal('detailModal');
        document.getElementById('detailModalBody').innerHTML = '<div style="text-align:center; padding: 20px;">Memuat data...</div>';
        document.getElementById('detailModalFooter').style.display = 'none';

        try {
            const endpoint = tab === 'kp_magang' ? `/admin/verifikasi/kp/${id}` : `/admin/verifikasi/ta/${id}`;
            const res = await fetch(endpoint);
            const json = await res.json();
            
            if (json.success) {
                const data = json.data;
                let bodyHtml = '';

                if (tab === 'kp_magang') {
                    document.querySelector('.modal-header h2').innerHTML = '<span class="material-icons-outlined" style="color:#1a5fb4;">description</span> Detail Pengajuan KP/Magang';
                    bodyHtml = `
                        <div class="detail-section">
                            <div class="detail-section-title">Data Mahasiswa</div>
                            <div class="detail-grid">
                                <div class="detail-item"><div class="label">Nama Lengkap</div><div class="val">${data.nama}</div></div>
                                <div class="detail-item"><div class="label">NIM</div><div class="val">${data.nim || '-'}</div></div>
                                <div class="detail-item"><div class="label">Angkatan</div><div class="val">${data.angkatan || '-'}</div></div>
                            </div>
                        </div>
                        <div class="detail-section">
                            <div class="detail-section-title">Data Kegiatan</div>
                            <div class="detail-grid">
                                <div class="detail-item"><div class="label">Jenis Kegiatan</div><div class="val"><span class="material-icons-outlined" style="font-size:14px; vertical-align:middle;">work_outline</span> ${data.jenis_kegiatan || '-'}</div></div>
                                <div class="detail-item"><div class="label">Perusahaan</div><div class="val"><span class="material-icons-outlined" style="font-size:14px; vertical-align:middle;">domain</span> ${data.perusahaan}</div></div>
                                <div class="detail-item" style="grid-column: 1 / -1;"><div class="label">Periode Kegiatan</div><div class="val"><span class="material-icons-outlined" style="font-size:14px; vertical-align:middle;">calendar_today</span> ${data.periode || '-'}</div></div>
                            </div>
                        </div>
                    `;
                } else {
                    document.querySelector('.modal-header h2').innerHTML = '<span class="material-icons-outlined" style="color:#1a5fb4;">school</span> Detail Pengajuan Tugas Akhir';
                    bodyHtml = `
                        <div class="detail-section">
                            <div class="detail-section-title">Data Mahasiswa</div>
                            <div class="detail-grid">
                                <div class="detail-item"><div class="label">Nama Lengkap</div><div class="val">${data.nama}</div></div>
                                <div class="detail-item"><div class="label">NIM</div><div class="val">${data.nim || '-'}</div></div>
                            </div>
>>>>>>> .merge_file_EpfAfx
                        </div>
                        <div class="detail-section">
                            <div class="detail-section-title">Data Tugas Akhir</div>
                            <div class="detail-grid" style="grid-template-columns: 1fr;">
                                <div class="detail-item"><div class="label">Judul Tugas Akhir</div><div class="val" style="font-weight: 700; color: #1a5fb4;">${data.title}</div></div>
                                <div class="detail-item"><div class="label">Abstrak</div><div class="val" style="text-align: justify;">${data.abstract || '-'}</div></div>
                            </div>
                        </div>
                    `;
                }

                document.getElementById('detailModalBody').innerHTML = bodyHtml;

                if (data.status === 'Pending Review' || data.status === 'pending') {
                    document.getElementById('detailModalFooter').style.display = 'flex';
                    document.getElementById('detailModalFooter').innerHTML = `
                        <button class="btn-danger" style="background:white; color:#dc2626; border:1px solid #fca5a5;" onclick="closeModal('detailModal'); openRejectModal(${id}, '${tab}')"><span class="material-icons-outlined" style="font-size:16px;">close</span> Tolak</button>
                        <button class="btn-primary" style="display:inline-flex; align-items:center; gap:6px;" onclick="approvePengajuan(${id}, '${tab}')"><span class="material-icons-outlined" style="font-size:16px;">check</span> Setujui</button>
                    `;
                } else {
                    document.getElementById('detailModalFooter').style.display = 'none';
                }
            } else {
                alert('Gagal memuat data');
                closeModal('detailModal');
            }
        } catch (e) {
            console.error(e);
            alert('Terjadi kesalahan koneksi.');
            closeModal('detailModal');
        }
    }

    async function approvePengajuan(id, tab) {
        if (!confirm('Apakah Anda yakin menyetujui pengajuan ini?')) return;

        try {
            const endpoint = tab === 'kp_magang' ? `/admin/verifikasi/kp/${id}/approve` : `/admin/verifikasi/ta/${id}/approve`;
            const res = await fetch(endpoint, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
            });
            const json = await res.json();
            if (json.success) {
                alert(json.message);
                window.location.reload();
            } else {
                alert('Gagal menyetujui.');
            }
        } catch (e) {
            alert('Terjadi kesalahan.');
        }
    }

    function openRejectModal(id, tab) {
        document.getElementById('rejectId').value = id;
        document.getElementById('rejectTab').value = tab;
        document.getElementById('alasan_penolakan').value = '';
        openModal('rejectModal');
    }

    async function submitReject(e) {
        e.preventDefault();
        const id = document.getElementById('rejectId').value;
        const tab = document.getElementById('rejectTab').value;
        const alasan = document.getElementById('alasan_penolakan').value;

        try {
            const endpoint = tab === 'kp_magang' ? `/admin/verifikasi/kp/${id}/reject` : `/admin/verifikasi/ta/${id}/reject`;
            const res = await fetch(endpoint, {
                method: 'POST',
                headers: { 
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ alasan_penolakan: alasan })
            });
            const json = await res.json();
            if (json.success) {
                alert(json.message);
                window.location.reload();
            } else {
                alert('Gagal menolak.');
            }
        } catch (e) {
            alert('Terjadi kesalahan.');
        }
    }
</script>
@endsection
