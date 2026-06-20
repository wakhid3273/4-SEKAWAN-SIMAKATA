@extends('layouts.admin')

@section('title', 'Edit Mahasiswa')

@section('extra_styles')
<style>
    .form-card {
        background: #fff;
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        padding: 32px;
        max-width: 800px;
    }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 8px; }
    .form-control { width: 100%; padding: 10px 14px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 14px; color: #111827; transition: border-color .2s; }
    .form-control:focus { border-color: #1a5fb4; outline: none; }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .btn-submit { background: #1a5fb4; color: #fff; padding: 10px 24px; border: none; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; transition: background .2s; }
    .btn-submit:hover { background: #1e40af; }
    .btn-cancel { background: #fff; color: #374151; border: 1px solid #d1d5db; padding: 10px 24px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; text-decoration: none; transition: background .2s; }
    .btn-cancel:hover { background: #f3f4f6; }
    .form-actions { display: flex; gap: 12px; margin-top: 32px; padding-top: 24px; border-top: 1px solid #e5e7eb; }
    .text-danger { color: #dc2626; font-size: 12px; margin-top: 4px; display: block; }
    .hint { font-size: 12px; color: #6b7280; margin-top: 4px; display: block; }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Mahasiswa</h1>
        <p class="subtitle">Ubah data informasi mahasiswa.</p>
    </div>
</div>

<div class="form-card">
    <form action="{{ route('admin.mahasiswa.update', $mahasiswa) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <div class="form-group">
                <label>NIM <span style="color:#dc2626">*</span></label>
                <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
                @error('nim') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Nama Lengkap <span style="color:#dc2626">*</span></label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}" required>
                @error('nama_lengkap') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password" class="form-control">
                <span class="hint">Kosongkan jika tidak ingin mengubah password.</span>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Angkatan</label>
                <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan', $mahasiswa->angkatan) }}">
            </div>
            <div class="form-group">
                <label>Program Studi</label>
                <input type="text" name="program_studi" class="form-control" value="{{ old('program_studi', $mahasiswa->program_studi) }}">
            </div>
            <div class="form-group">
                <label>Semester Aktif</label>
                <input type="number" name="semester_aktif" class="form-control" value="{{ old('semester_aktif', $mahasiswa->semester_aktif) }}">
            </div>
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $mahasiswa->nomor_telepon) }}">
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label>Status Akademik</label>
                <select name="status_akademik" class="form-control">
                    <option value="Aktif" {{ old('status_akademik', $mahasiswa->status_akademik) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Cuti" {{ old('status_akademik', $mahasiswa->status_akademik) == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                    <option value="Lulus" {{ old('status_akademik', $mahasiswa->status_akademik) == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                    <option value="Mengundurkan Diri" {{ old('status_akademik', $mahasiswa->status_akademik) == 'Mengundurkan Diri' ? 'selected' : '' }}>Mengundurkan Diri</option>
                </select>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Update Data</button>
            <a href="{{ route('admin.mahasiswa.index') }}" class="btn-cancel">Batal</a>
        </div>
    </form>
</div>
@endsection
