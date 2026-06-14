@extends('layouts.admin')

@section('title', 'Kelola Perusahaan')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold mb-0">Kelola Perusahaan</h1>
        <p class="subtitle text-muted">Manajemen data perusahaan untuk magang dan tugas akhir.</p>
    </div>
    <a href="{{ route('admin.perusahaan.create') }}" class="btn btn-primary">
        <span class="material-icons-outlined align-middle fs-5 me-1">add</span> Tambah Perusahaan
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="background:#d1fae5; color:#065f46; padding:12px; border-radius:8px; margin-bottom:20px; border:1px solid #10b981;">
    {{ session('success') }}
</div>
@endif

<div class="card table-card p-4">
    <table class="data-table w-100" style="border-collapse: collapse;">
        <thead>
            <tr style="border-bottom: 2px solid #f3f4f6;">
                <th style="padding: 12px; text-align: left;">Nama Perusahaan</th>
                <th style="padding: 12px; text-align: left;">Lokasi</th>
                <th style="padding: 12px; text-align: left;">Mahasiswa</th>
                <th style="padding: 12px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($perusahaan as $p)
                <tr style="border-bottom: 1px solid #f3f4f6;">
                    <td style="padding: 16px 12px;"><strong>{{ $p->nama }}</strong></td>
                    <td style="padding: 16px 12px;">{{ $p->lokasi }}</td>
                    <td style="padding: 16px 12px;">{{ $p->jumlah_mahasiswa }}</td>
                    <td style="padding: 16px 12px; text-align: center;">
                        <a href="{{ route('admin.perusahaan.edit', $p->id) }}" class="btn-page" style="text-decoration:none; color:#1a5fb4; padding:6px 12px; border-radius:6px; border:1px solid #1a5fb4; display:inline-block; margin-right:4px;">Edit</a>
                        <form action="{{ route('admin.perusahaan.destroy', $p->id) }}" method="POST" class="d-inline" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-page" style="color:#dc2626; padding:6px 12px; border-radius:6px; border:1px solid #dc2626; background:transparent; cursor:pointer;" onclick="return confirm('Apakah Anda yakin ingin menghapus perusahaan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center" style="padding: 20px;">Belum ada data perusahaan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
