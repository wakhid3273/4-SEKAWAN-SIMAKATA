@extends('layouts.admin')

@section('title', 'Edit Mahasiswa')

@section('extra_styles')
<style>
    .form-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    .form-card {
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
        border: 1px solid rgba(0,0,0,0.04);
        padding: 32px;
        animation: fade-up 0.4s ease both;
    }
    @keyframes fade-up {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .form-section-header {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: #1a5fb4;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e5e7eb;
    }
    .form-group { margin-bottom: 20px; }
    .form-group label { 
        display: block; 
        font-size: 13px; 
        font-weight: 600; 
        color: #374151; 
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .required-mark {
        color: #dc2626;
        font-size: 14px;
    }
    .form-control { 
        width: 100%; 
        padding: 11px 14px; 
        border: 1px solid #d1d5db; 
        border-radius: 10px; 
        font-size: 14px; 
        color: #111827;
        background: #ffffff;
        font-family: inherit;
        transition: all 0.2s ease;
    }
    .form-control:focus { 
        border-color: #1a5fb4; 
        outline: none;
        box-shadow: 0 0 0 3px rgba(26,95,180,0.08);
    }
    .form-control::placeholder {
        color: #9ca3af;
    }
    .form-grid { 
        display: grid; 
        grid-template-columns: 1fr 1fr; 
        gap: 20px; 
    }
    .form-helper {
        font-size: 11px;
        color: #6b7280;
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .form-helper .material-icons-outlined {
        font-size: 14px;
    }
    .btn-submit { 
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #1a5fb4; 
        color: #fff; 
        padding: 11px 24px; 
        border: none; 
        border-radius: 10px; 
        font-size: 14px; 
        font-weight: 600;
        font-family: inherit;
        cursor: pointer; 
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .btn-submit:hover { 
        background: #1e40af;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(26,95,180,0.25);
    }
    .btn-submit .material-icons-outlined {
        font-size: 18px;
    }
    .btn-cancel { 
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #fff; 
        color: #6b7280; 
        border: 1px solid #d1d5db; 
        padding: 11px 20px; 
        border-radius: 10px; 
        font-size: 14px; 
        font-weight: 600; 
        cursor: pointer; 
        text-decoration: none; 
        transition: all 0.2s ease;
    }
    .btn-cancel:hover { 
        background: #f9fafb;
        color: #374151;
        border-color: #9ca3af;
    }
    .btn-cancel .material-icons-outlined {
        font-size: 18px;
    }
    .form-actions { 
        display: flex; 
        gap: 12px; 
        margin-top: 32px; 
        padding-top: 24px; 
        border-top: 1px solid #f3f4f6;
    }
    .text-danger { 
        color: #dc2626; 
        font-size: 12px; 
        margin-top: 6px; 
        display: flex;
        align-items: center;
        gap: 4px;
        font-weight: 500;
    }
    .text-danger::before {
        content: '⚠';
        font-size: 14px;
    }
    .hint { 
        font-size: 11px; 
        color: #6b7280; 
        margin-top: 4px; 
        display: block;
    }
    
    @media (max-width: 768px) {
        .form-card {
            padding: 24px 20px;
        }
        .form-grid {
            grid-template-columns: 1fr;
        }
        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }
        .btn-submit,
        .btn-cancel {
            width: 100%;
            justify-content: center;
        }
    }
    
    @media (max-width: 600px) {
        .form-card {
            padding: 20px 16px;
        }
    }
</style>
@endsection

@section('content')
<div class="form-container">
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
            
            <div class="form-section-header">Informasi Mahasiswa</div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label>
                        NIM
                        <span class="required-mark">*</span>
                    </label>
                    <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" placeholder="Contoh: H1D022009" required>
                    @error('nim') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>
                        Nama Lengkap
                        <span class="required-mark">*</span>
                    </label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}" placeholder="Contoh: Brian Cahya Purnama" required>
                    @error('nama_lengkap') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}" placeholder="student@example.com">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••">
                    <span class="hint">Kosongkan jika tidak ingin mengubah password.</span>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Angkatan</label>
                    <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan', $mahasiswa->angkatan) }}" placeholder="Contoh: 2022">
                </div>
                <div class="form-group">
                    <label>Program Studi</label>
                    <input type="text" name="program_studi" class="form-control" value="{{ old('program_studi', $mahasiswa->program_studi) }}" placeholder="Contoh: Informatika">
                </div>
                <div class="form-group">
                    <label>Semester Aktif</label>
                    <input type="number" name="semester_aktif" class="form-control" value="{{ old('semester_aktif', $mahasiswa->semester_aktif) }}" placeholder="5" min="1" max="14">
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $mahasiswa->nomor_telepon) }}" placeholder="08123456789">
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
                <button type="submit" class="btn-submit">
                    <span class="material-icons-outlined">save</span>
                    Update Data
                </button>
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn-cancel">
                    <span class="material-icons-outlined">close</span>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
