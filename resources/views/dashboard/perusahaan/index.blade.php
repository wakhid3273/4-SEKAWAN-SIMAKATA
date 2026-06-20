@extends('layouts.admin')

@section('title', 'Kelola Perusahaan')

@section('extra_styles')
<style>
    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        border-radius: 10px;
        background: #1a5fb4;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s;
    }
    .btn-add:hover { background: #1e40af; }
    
    .table-actions {
        display: flex;
        gap: 8px;
        justify-content: center;
    }
    .btn-action-edit {
        background: white; border: 1px solid #1a5fb4; color: #1a5fb4;
        padding: 6px 12px; border-radius: 6px; font-weight: 600; font-size: 11px; text-decoration: none; transition: 0.2s;
    }
    .btn-action-edit:hover { background: #1a5fb4; color: white; }
    
    .btn-action-delete {
        background: white; border: 1px solid #dc2626; color: #dc2626;
        padding: 6px 12px; border-radius: 6px; font-weight: 600; font-size: 11px; cursor: pointer; transition: 0.2s;
    }
    .btn-action-delete:hover { background: #dc2626; color: white; }

    .pagination-wrapper {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }
    .pagination-wrapper nav svg { width: 20px; height: 20px; }
    .pagination-wrapper .flex.justify-between { display: none; }
    .alert-success {
        background: #d1fae5; color: #065f46; padding: 12px 16px; border-radius: 8px; margin-bottom: 24px; border: 1px solid #10b981; font-weight: 600; font-size: 13px;
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
        <span class="material-icons-outlined">add</span> Tambah Perusahaan
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    <span class="material-icons-outlined" style="vertical-align: middle; font-size: 18px; margin-right: 4px;">check_circle</span>
    {{ session('success') }}
</div>
@endif

<div class="card table-card" style="padding: 24px;">
    <table class="data-table" style="width: 100%;">
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
                    <td><strong>{{ $p->nama }}</strong></td>
                    <td>{{ $p->lokasi }}</td>
                    <td>{{ $p->jumlah_mahasiswa }} Mahasiswa</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.perusahaan.edit', $p->id) }}" class="btn-action-edit">Edit</a>
                            <form action="{{ route('admin.perusahaan.destroy', $p->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus perusahaan ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 32px; color: #6b7280;">Belum ada data perusahaan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="pagination-wrapper">
        {{ $perusahaan->links() }}
    </div>
</div>
@endsection
