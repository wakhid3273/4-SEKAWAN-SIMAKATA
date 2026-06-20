@extends('layouts.admin')

@section('title', 'Edit Profil Admin')

@section('extra_styles')
<style>
    .card-edit {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 24px;
        max-width: 600px;
        margin-top: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }
    .form-input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
    }
    .form-input:focus {
        outline: none;
        border-color: #1a5fb4;
        box-shadow: 0 0 0 3px rgba(26,95,180,0.1);
    }
    .btn-submit {
        background: #1a5fb4;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
    }
    .btn-submit:hover {
        background: #1450a0;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Profil Administrator</h1>
        <p class="subtitle">Perbarui informasi profil Anda.</p>
    </div>
</div>

<div class="card-edit">
    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label">Foto Profil (Opsional)</label>
            @if($admin->avatar)
                <img src="{{ Storage::url($admin->avatar) }}" alt="Avatar" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 10px; display: block;">
            @endif
            <input type="file" name="avatar" class="form-input" accept="image/*">
        </div>
        
        <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-input" value="{{ old('nama_lengkap', $admin->nama_lengkap) }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-input" value="{{ old('email', $admin->email) }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">ID Administrator (NIM)</label>
            <input type="text" name="nim" class="form-input" value="{{ old('nim', $admin->nim) }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Password Baru (Opsional)</label>
            <input type="password" name="password" class="form-input" placeholder="Kosongkan jika tidak ingin mengubah password">
        </div>
        
        <button type="submit" class="btn-submit">Simpan Perubahan</button>
        <a href="{{ route('admin.profil') }}" style="margin-left: 10px; color: #6b7280; font-size: 14px; text-decoration: none;">Batal</a>
    </form>
</div>
@endsection
