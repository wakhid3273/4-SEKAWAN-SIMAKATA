@extends('layouts.admin')

@section('title', 'Tambah Perusahaan')

@section('extra_styles')
<style>
    /* Form Container */
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
    
    /* Form Header */
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
    
    /* Form Groups */
    .form-group { 
        margin-bottom: 22px; 
    }
    
    .form-label { 
        display: block; 
        margin-bottom: 8px; 
        font-weight: 600; 
        font-size: 13px; 
        color: #374151;
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
        font-family: inherit;
        color: #111827;
        background: #ffffff;
        transition: all 0.2s ease;
    }
    
    .form-control:focus { 
        outline: none; 
        border-color: #1a5fb4; 
        box-shadow: 0 0 0 3px rgba(26,95,180,0.08); 
    }
    
    .form-control::placeholder {
        color: #9ca3af;
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 100px;
        line-height: 1.6;
    }
    
    /* Form Grid Layout */
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 22px;
    }
    
    /* Helper text */
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
    
    /* Error messages */
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
    
    /* Form Actions */
    .form-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 32px;
        padding-top: 24px;
        border-top: 1px solid #f3f4f6;
    }
    
    .btn-submit { 
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 24px; 
        background: #1a5fb4; 
        color: #fff; 
        border: none; 
        border-radius: 10px; 
        font-weight: 600; 
        font-size: 14px;
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
        padding: 11px 20px;
        background: #ffffff;
        color: #6b7280;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-weight: 600;
        font-size: 14px;
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
    
    /* Input Icons */
    .input-with-icon {
        position: relative;
    }
    
    .input-with-icon .form-control {
        padding-left: 40px;
    }
    
    .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 18px;
        pointer-events: none;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .form-card {
            padding: 24px 20px;
        }
        
        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
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
    {{-- Page Header --}}
    <div class="page-header">
        <div>
            <h1>Tambah Perusahaan</h1>
            <p class="subtitle">Tambahkan data perusahaan baru.</p>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="form-card">
        <form action="{{ route('admin.perusahaan.store') }}" method="POST">
            @csrf
            
            {{-- Informasi Dasar --}}
            <div class="form-section-header">Informasi Dasar</div>
            
            <div class="form-group">
                <label class="form-label" for="nama">
                    Nama Perusahaan
                    <span class="required-mark">*</span>
                </label>
                <div class="input-with-icon">
                    <span class="material-icons-outlined input-icon">business</span>
                    <input type="text" id="nama" name="nama" class="form-control" 
                           value="{{ old('nama') }}" 
                           placeholder="Contoh: PT Teknologi Indonesia" required>
                </div>
                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="lokasi">
                    Lokasi (Kota/Daerah)
                    <span class="required-mark">*</span>
                </label>
                <div class="input-with-icon">
                    <span class="material-icons-outlined input-icon">location_on</span>
                    <input type="text" id="lokasi" name="lokasi" class="form-control" 
                           value="{{ old('lokasi') }}" 
                           placeholder="Contoh: Malang" required>
                </div>
                @error('lokasi') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="tentang">Tentang Perusahaan</label>
                <textarea id="tentang" name="tentang" class="form-control" 
                          placeholder="Deskripsi singkat tentang perusahaan...">{{ old('tentang') }}</textarea>
                <span class="form-helper">
                    <span class="material-icons-outlined">info</span>
                    Jelaskan secara singkat profil dan bidang usaha perusahaan
                </span>
                @error('tentang') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            {{-- Kontak & Informasi --}}
            <div class="form-section-header" style="margin-top: 32px;">Kontak & Informasi</div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="website">Website URL</label>
                    <div class="input-with-icon">
                        <span class="material-icons-outlined input-icon">language</span>
                        <input type="url" id="website" name="website" class="form-control" 
                               value="{{ old('website') }}" 
                               placeholder="https://example.com">
                    </div>
                    @error('website') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="email">Email Kontak</label>
                    <div class="input-with-icon">
                        <span class="material-icons-outlined input-icon">email</span>
                        <input type="email" id="email" name="email" class="form-control" 
                               value="{{ old('email') }}" 
                               placeholder="contact@example.com">
                    </div>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="alamat">Alamat Lengkap</label>
                <div class="input-with-icon">
                    <span class="material-icons-outlined input-icon">place</span>
                    <input type="text" id="alamat" name="alamat" class="form-control" 
                           value="{{ old('alamat') }}" 
                           placeholder="Jl. Contoh No. 123, Malang 65141">
                </div>
                @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="max-width: 300px;">
                <label class="form-label" for="jumlah_mahasiswa">Kuota Mahasiswa</label>
                <div class="input-with-icon">
                    <span class="material-icons-outlined input-icon">groups</span>
                    <input type="number" id="jumlah_mahasiswa" name="jumlah_mahasiswa" class="form-control" 
                           value="{{ old('jumlah_mahasiswa', 0) }}" 
                           min="0" placeholder="10">
                </div>
                @error('jumlah_mahasiswa') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            {{-- Form Actions --}}
            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <span class="material-icons-outlined">save</span>
                    Simpan Perusahaan
                </button>
                <a href="{{ route('admin.perusahaan.index') }}" class="btn-cancel">
                    <span class="material-icons-outlined">close</span>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
