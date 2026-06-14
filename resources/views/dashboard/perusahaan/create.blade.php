@extends('layouts.admin')

@section('title', 'Tambah Perusahaan')

@section('extra_styles')
<style>
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 13px; color: #374151; }
    .form-control { width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 14px; font-family: inherit; }
    .form-control:focus { outline: none; border-color: #1a5fb4; box-shadow: 0 0 0 3px rgba(26,95,180,0.1); }
    .btn-submit { padding: 10px 24px; background: #1a5fb4; color: #fff; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
    .btn-submit:hover { background: #1e40af; }
    .text-danger { color: #dc2626; font-size: 12px; margin-top: 4px; display: block; }
</style>
@endsection

@section('content')
<div class="page-header mb-4">
    <h1 class="h3 fw-bold mb-0">Tambah Perusahaan</h1>
    <p class="subtitle text-muted">Tambahkan data perusahaan baru.</p>
</div>

<div class="card p-4" style="max-width: 800px;">
    <form action="{{ route('admin.perusahaan.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="nama">Nama Perusahaan <span style="color:#dc2626;">*</span></label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="lokasi">Lokasi (Kota/Daerah) <span style="color:#dc2626;">*</span></label>
            <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
            @error('lokasi') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="tentang">Tentang Perusahaan</label>
            <textarea id="tentang" name="tentang" class="form-control" rows="4">{{ old('tentang') }}</textarea>
            @error('tentang') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="row" style="display: flex; gap: 20px;">
            <div class="form-group" style="flex: 1;">
                <label class="form-label" for="website">Website URL</label>
                <input type="url" id="website" name="website" class="form-control" value="{{ old('website') }}">
                @error('website') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group" style="flex: 1;">
                <label class="form-label" for="email">Email Kontak</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="alamat">Alamat Lengkap</label>
            <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat') }}">
            @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group" style="width: 200px;">
            <label class="form-label" for="jumlah_mahasiswa">Kuota / Jumlah Mahasiswa</label>
            <input type="number" id="jumlah_mahasiswa" name="jumlah_mahasiswa" class="form-control" value="{{ old('jumlah_mahasiswa', 0) }}" min="0">
            @error('jumlah_mahasiswa') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn-submit">Simpan Perusahaan</button>
            <a href="{{ route('admin.perusahaan.index') }}" style="margin-left:12px; color:#6b7280; text-decoration:none; font-weight:600; font-size:14px;">Batal</a>
        </div>
    </form>
</div>
@endsection
