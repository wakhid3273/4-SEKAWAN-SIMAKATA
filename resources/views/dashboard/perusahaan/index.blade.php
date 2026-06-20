@extends('layouts.admin')

@section('title', 'Kelola Perusahaan')

@section('extra_styles')
<style>
    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 24px;
        border-radius: 10px;
        background: #1a5fb4;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .btn-add:hover { 
        background: #1e40af;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(26,95,180,0.25);
    }
    .btn-add .material-icons-outlined {
        font-size: 18px;
    }
    
    .table-container {
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
        border: 1px solid rgba(0,0,0,0.04);
        overflow: hidden;
        animation: fade-up 0.4s ease both;
    }
    
    @keyframes fade-up {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    
    .data-table {
        width: 100%;
        border-collapse: collapse;
    }
    .data-table thead tr {
        background: #f8fafc;
        border-bottom: 1px solid #e5e7eb;
    }
    .data-table th {
        padding: 14px 24px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        color: #6b7280;
        text-align: left;
    }
    .data-table td {
        padding: 16px 24px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #f3f4f6;
        vertical-align: middle;
    }
    .data-table tbody tr {
        transition: background 0.15s;
    }
    .data-table tbody tr:hover {
        background: #f9fafb;
    }
    .data-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .company-name {
        font-weight: 600;
        color: #111827;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .company-name .material-icons-outlined {
        font-size: 18px;
        color: #1a5fb4;
    }
    
    .table-actions {
        display: flex;
        gap: 8px;
        justify-content: center;
    }
    .btn-action-edit {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: white;
        border: 1px solid #1a5fb4;
        color: #1a5fb4;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 11px;
        text-decoration: none;
        transition: all 0.2s;
    }
    .btn-action-edit:hover {
        background: #1a5fb4;
        color: white;
    }
    .btn-action-edit .material-icons-outlined {
        font-size: 14px;
    }
    
    .btn-action-delete {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: white;
        border: 1px solid #dc2626;
        color: #dc2626;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 11px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-action-delete:hover {
        background: #dc2626;
        color: white;
    }
    .btn-action-delete .material-icons-outlined {
        font-size: 14px;
    }

    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 24px;
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
    
    .alert-success {
        background: #dcfce7;
        color: #15803d;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 24px;
        border: 1px solid #86efac;
        font-weight: 600;
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 8px;
        animation: fade-up 0.3s ease both;
    }
    .alert-success .material-icons-outlined {
        font-size: 20px;
    }
    
    .empty-state {
        text-align: center;
        padding: 48px 24px;
        color: #9ca3af;
    }
    .empty-state .material-icons-outlined {
        font-size: 48px;
        margin-bottom: 12px;
        display: block;
        color: #d1d5db;
    }
    .empty-state p {
        font-size: 14px;
        margin: 0;
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
        .data-table {
            display: block;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .data-table th,
        .data-table td {
            padding: 12px 16px;
            font-size: 12px;
        }
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1>Kelola Perusahaan</h1>
        <p class="subtitle">Manajemen data perusahaan untuk magang dan tugas akhir.</p>
    </div>
    <a href="{{ route('admin.perusahaan.create') }}" class="btn-add">
        <span class="material-icons-outlined">add_business</span>
        Tambah Perusahaan
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    <span class="material-icons-outlined">check_circle</span>
    {{ session('success') }}
</div>
@endif

<div class="table-container">
    <table class="data-table">
        <thead>
            <tr>
                <th>Nama Perusahaan</th>
                <th>Lokasi</th>
                <th>Mahasiswa</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($perusahaan as $p)
                <tr>
                    <td>
                        <div class="company-name">
                            <span class="material-icons-outlined">business</span>
                            {{ $p->nama }}
                        </div>
                    </td>
                    <td>{{ $p->lokasi }}</td>
                    <td>{{ $p->jumlah_mahasiswa }} Mahasiswa</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.perusahaan.edit', $p->id) }}" class="btn-action-edit">
                                <span class="material-icons-outlined">edit</span>
                                Edit
                            </a>
                            <form action="{{ route('admin.perusahaan.destroy', $p->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus perusahaan ini?')">
                                    <span class="material-icons-outlined">delete</span>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="empty-state">
                            <span class="material-icons-outlined">domain_disabled</span>
                            <p>Belum ada data perusahaan.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($perusahaan->hasPages())
    <div class="pagination-container">
        <div class="pagination-info">
            Showing <strong>{{ $perusahaan->firstItem() ?? 0 }}-{{ $perusahaan->lastItem() ?? 0 }}</strong> of <strong>{{ $perusahaan->total() }}</strong> results
        </div>
        <div class="pagination-links">
            {{-- Previous Button --}}
            @if ($perusahaan->onFirstPage())
                <span class="pagination-btn disabled">
                    <span class="material-icons-outlined">chevron_left</span>
                </span>
            @else
                <a href="{{ $perusahaan->previousPageUrl() }}" class="pagination-btn">
                    <span class="material-icons-outlined">chevron_left</span>
                </a>
            @endif

            {{-- Page Numbers --}}
            @php
                $start = max($perusahaan->currentPage() - 2, 1);
                $end = min($start + 4, $perusahaan->lastPage());
                $start = max($end - 4, 1);
            @endphp

            @if($start > 1)
                <a href="{{ $perusahaan->url(1) }}" class="pagination-btn">1</a>
                @if($start > 2)
                    <span class="pagination-btn disabled">...</span>
                @endif
            @endif

            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $perusahaan->currentPage())
                    <span class="pagination-btn active">{{ $i }}</span>
                @else
                    <a href="{{ $perusahaan->url($i) }}" class="pagination-btn">{{ $i }}</a>
                @endif
            @endfor

            @if($end < $perusahaan->lastPage())
                @if($end < $perusahaan->lastPage() - 1)
                    <span class="pagination-btn disabled">...</span>
                @endif
                <a href="{{ $perusahaan->url($perusahaan->lastPage()) }}" class="pagination-btn">{{ $perusahaan->lastPage() }}</a>
            @endif

            {{-- Next Button --}}
            @if ($perusahaan->hasMorePages())
                <a href="{{ $perusahaan->nextPageUrl() }}" class="pagination-btn">
                    <span class="material-icons-outlined">chevron_right</span>
                </a>
            @else
                <span class="pagination-btn disabled">
                    <span class="material-icons-outlined">chevron_right</span>
                </span>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection

