@extends('layouts.admin')

@section('title', 'Edit Profil Admin')

@section('extra_styles')
<style>
    .card-edit {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 24px;
        max-width: 800px;
        margin-top: 20px;
    }
    .section-title {
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 16px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .section-title .material-icons-outlined {
        color: #1a5fb4;
        font-size: 20px;
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
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        font-size: 14px;
    }
    .btn-submit:hover {
        background: #1450a0;
    }
    
    /* Profile Photo Upload */
    .profile-photo-upload {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-top: 10px;
    }
    .profile-photo-preview {
        width: 100px;
        height: 100px;
        border-radius: 16px;
        object-fit: cover;
        border: 3px solid #e5e7eb;
    }
    .profile-photo-actions {
        flex: 1;
    }
    .upload-btn {
        display: inline-block;
        padding: 8px 16px;
        background: #f3f6fb;
        color: #1a5fb4;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border: 1px solid #d1d5db;
        transition: all 0.2s;
    }
    .upload-btn:hover {
        background: #e8f0fb;
        border-color: #1a5fb4;
    }
    .delete-btn {
        display: inline-block;
        padding: 8px 16px;
        background: #fee2e2;
        color: #dc2626;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border: 1px solid #fecaca;
        transition: all 0.2s;
        margin-left: 8px;
    }
    .delete-btn:hover {
        background: #fecaca;
        border-color: #dc2626;
    }
    
    /* Cover Upload */
    .cover-upload-section {
        margin-top: 30px;
        padding-top: 30px;
        border-top: 2px solid #f3f4f6;
    }
    .cover-tabs {
        display: flex;
        gap: 10px;
        margin-bottom: 16px;
    }
    .cover-tab {
        padding: 8px 16px;
        background: #f3f4f6;
        color: #6b7280;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.2s;
    }
    .cover-tab.active {
        background: #e8f0fb;
        color: #1a5fb4;
        border-color: #1a5fb4;
    }
    .cover-preview {
        width: 100%;
        max-height: 300px;
        border-radius: 12px;
        object-fit: cover;
        border: 2px solid #e5e7eb;
        margin-top: 10px;
    }
    .cover-upload-area {
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        background: #f9fafb;
        cursor: pointer;
        transition: all 0.2s;
    }
    .cover-upload-area:hover {
        border-color: #1a5fb4;
        background: #f3f6fb;
    }
    .cover-upload-area .material-icons-outlined {
        font-size: 48px;
        color: #9ca3af;
        margin-bottom: 10px;
    }
    .cover-upload-info {
        font-size: 13px;
        color: #6b7280;
        margin-top: 8px;
    }
    .video-duration-warning {
        background: #fef3c7;
        border: 1px solid #fbbf24;
        color: #92400e;
        padding: 10px 14px;
        border-radius: 8px;
        font-size: 12px;
        margin-top: 10px;
        display: none;
    }
    .video-duration-warning.show {
        display: block;
    }
    
    .info-box {
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        border-radius: 8px;
        padding: 12px;
        font-size: 12px;
        color: #0c4a6e;
        margin-top: 8px;
        display: flex;
        align-items: start;
        gap: 8px;
    }
    .info-box .material-icons-outlined {
        font-size: 18px;
        color: #0284c7;
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

@if(session('success'))
<div style="background: #d1fae5; border: 1px solid #6ee7b7; color: #065f46; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
    <span class="material-icons-outlined" style="font-size: 20px; color: #10b981;">check_circle</span>
    <span style="font-weight: 600;">{{ session('success') }}</span>
</div>
@endif

@if($errors->any())
<div style="background: #fee2e2; border: 1px solid #fecaca; color: #991b1b; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px;">
    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
        <span class="material-icons-outlined" style="font-size: 20px; color: #dc2626;">error</span>
        <span style="font-weight: 600;">Terdapat kesalahan:</span>
    </div>
    <ul style="margin: 0; padding-left: 28px;">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card-edit">
    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" id="profileForm">
        @csrf
        @method('PUT')
        
        <!-- Informasi Profil Section -->
        <div class="section-title">
            <span class="material-icons-outlined">badge</span>
            Informasi Profil
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
        
        <!-- Foto Profil Section -->
        <div class="cover-upload-section">
            <div class="section-title">
                <span class="material-icons-outlined">account_circle</span>
                Foto Profil
            </div>
            
            <div class="profile-photo-upload">
                <img id="profilePhotoPreview" 
                     src="{{ $admin->profile_photo ? Storage::url($admin->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($admin->nama_lengkap ?? 'Admin') . '&background=1a5fb4&color=fff&size=200' }}" 
                     alt="Profile Photo" 
                     class="profile-photo-preview">
                <div class="profile-photo-actions">
                    <input type="file" id="profilePhotoInput" name="profile_photo" accept="image/jpeg,image/png,image/jpg,image/webp" style="display: none;">
                    <label for="profilePhotoInput" class="upload-btn">
                        <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle; margin-right: 4px;">upload</span>
                        Upload Foto
                    </label>
                    @if($admin->profile_photo)
                    <button type="button" class="delete-btn" id="deletePhotoBtn" onclick="deleteProfilePhoto()">
                        <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle; margin-right: 4px;">delete</span>
                        Hapus Foto
                    </button>
                    @endif
                    <input type="hidden" name="delete_profile_photo" id="deleteProfilePhotoFlag" value="0">
                    <div class="info-box" style="margin-top: 12px;">
                        <span class="material-icons-outlined">info</span>
                        <span>Format: JPG, JPEG, PNG, WEBP. Maksimal 5MB. Rasio 1:1 disarankan.</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Cover Profil Section -->
        <div class="cover-upload-section">
            <div class="section-title">
                <span class="material-icons-outlined">wallpaper</span>
                Cover Profil
            </div>
            
            @if($admin->cover_file)
                <!-- Tampilkan cover yang sedang digunakan -->
                <div id="currentCoverDisplay">
                    <div style="margin-bottom: 12px; font-size: 13px; color: #6b7280; font-weight: 600;">
                        Cover yang Sedang Digunakan: 
                        <span style="color: #1a5fb4;">{{ $admin->cover_type === 'video' ? 'Video' : 'Gambar' }}</span>
                    </div>
                    
                    @if($admin->cover_type === 'video')
                        <video src="{{ Storage::url($admin->cover_file) }}" class="cover-preview" autoplay muted loop></video>
                    @else
                        <img src="{{ Storage::url($admin->cover_file) }}" alt="Cover" class="cover-preview">
                    @endif
                    
                    <div style="margin-top: 12px;">
                        <button type="button" class="delete-btn" onclick="deleteCover()">
                            <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle; margin-right: 4px;">delete</span>
                            Hapus Cover
                        </button>
                        <input type="hidden" name="delete_cover" id="deleteCoverFlag" value="0">
                    </div>
                </div>
            @else
                <!-- Tidak ada cover, tampilkan upload area -->
                <div class="cover-tabs">
                    <div class="cover-tab active" id="imageTab" onclick="switchCoverTab('image')">
                        <span class="material-icons-outlined" style="font-size: 16px; vertical-align: middle; margin-right: 4px;">image</span>
                        Gambar
                    </div>
                    <div class="cover-tab" id="videoTab" onclick="switchCoverTab('video')">
                        <span class="material-icons-outlined" style="font-size: 16px; vertical-align: middle; margin-right: 4px;">videocam</span>
                        Video
                    </div>
                </div>
                
                <input type="hidden" name="cover_type" id="coverType" value="image">
                
                <!-- Image Upload -->
                <div id="imageUploadSection">
                    <input type="file" id="coverImageInput" name="cover_file" accept="image/jpeg,image/png,image/jpg,image/webp" style="display: none;">
                    <label for="coverImageInput" class="cover-upload-area">
                        <span class="material-icons-outlined">add_photo_alternate</span>
                        <div style="font-weight: 600; color: #374151;">Klik untuk upload gambar cover</div>
                        <div class="cover-upload-info">Format: JPG, JPEG, PNG, WEBP. Maksimal 10MB.</div>
                    </label>
                    <img id="coverImagePreview" src="" alt="Cover Preview" class="cover-preview" style="display: none;">
                </div>
                
                <!-- Video Upload -->
                <div id="videoUploadSection" style="display: none;">
                    <input type="file" id="coverVideoInput" name="cover_file" accept="video/mp4,video/webm" style="display: none;">
                    <label for="coverVideoInput" class="cover-upload-area">
                        <span class="material-icons-outlined">videocam</span>
                        <div style="font-weight: 600; color: #374151;">Klik untuk upload video cover</div>
                        <div class="cover-upload-info">Format: MP4, WEBM. Maksimal 5 detik, 10MB.</div>
                    </label>
                    <video id="coverVideoPreview" src="" class="cover-preview" autoplay muted loop style="display: none;"></video>
                    <div class="video-duration-warning" id="videoDurationWarning">
                        <span class="material-icons-outlined" style="font-size: 16px; vertical-align: middle; margin-right: 4px;">warning</span>
                        Video melebihi durasi maksimal 5 detik. Pilih video yang lebih pendek.
                    </div>
                </div>
            @endif
            
            <div class="info-box" style="margin-top: 12px;">
                <span class="material-icons-outlined">info</span>
                <span>Cover akan tampil sebagai background header profil. Video akan autoplay, muted, dan loop.</span>
            </div>
        </div>
        
        <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #f3f4f6;">
            <button type="submit" class="btn-submit">
                <span class="material-icons-outlined" style="font-size: 16px; vertical-align: middle; margin-right: 6px;">save</span>
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.profil') }}" style="margin-left: 10px; color: #6b7280; font-size: 14px; text-decoration: none;">Batal</a>
        </div>
    </form>
</div>

<script>
// Profile Photo Preview
document.getElementById('profilePhotoInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        // Validate file size (5MB)
        if (file.size > 5 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 5MB.');
            e.target.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('profilePhotoPreview').src = event.target.result;
            
            // Show delete button if not visible
            const deleteBtn = document.getElementById('deletePhotoBtn');
            if (!deleteBtn) {
                const uploadBtn = document.querySelector('label[for="profilePhotoInput"]');
                const newDeleteBtn = document.createElement('button');
                newDeleteBtn.type = 'button';
                newDeleteBtn.className = 'delete-btn';
                newDeleteBtn.id = 'deletePhotoBtn';
                newDeleteBtn.onclick = deleteProfilePhoto;
                newDeleteBtn.innerHTML = '<span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle; margin-right: 4px;">delete</span>Hapus Foto';
                uploadBtn.insertAdjacentElement('afterend', newDeleteBtn);
            }
        };
        reader.readAsDataURL(file);
        
        // Reset delete flag
        document.getElementById('deleteProfilePhotoFlag').value = '0';
    }
});

// Delete Profile Photo
function deleteProfilePhoto() {
    if (confirm('Apakah Anda yakin ingin menghapus foto profil?')) {
        document.getElementById('deleteProfilePhotoFlag').value = '1';
        document.getElementById('profilePhotoPreview').src = 'https://ui-avatars.com/api/?name={{ urlencode($admin->nama_lengkap ?? 'Admin') }}&background=1a5fb4&color=fff&size=200';
        document.getElementById('profilePhotoInput').value = '';
        
        // Hide delete button
        const deleteBtn = document.getElementById('deletePhotoBtn');
        if (deleteBtn) {
            deleteBtn.style.display = 'none';
        }
    }
}

// Cover Tab Switching (hanya jika belum ada cover)
function switchCoverTab(type) {
    // Update tabs
    document.querySelectorAll('.cover-tab').forEach(tab => tab.classList.remove('active'));
    if (type === 'image') {
        document.getElementById('imageTab').classList.add('active');
    } else {
        document.getElementById('videoTab').classList.add('active');
    }
    
    // Update cover type
    document.getElementById('coverType').value = type;
    
    // Show/hide sections
    if (type === 'image') {
        document.getElementById('imageUploadSection').style.display = 'block';
        document.getElementById('videoUploadSection').style.display = 'none';
        // Clear video input
        const videoInput = document.getElementById('coverVideoInput');
        if (videoInput) videoInput.value = '';
    } else {
        document.getElementById('imageUploadSection').style.display = 'none';
        document.getElementById('videoUploadSection').style.display = 'block';
        // Clear image input
        const imageInput = document.getElementById('coverImageInput');
        if (imageInput) imageInput.value = '';
    }
}

// Cover Image Preview
const coverImageInput = document.getElementById('coverImageInput');
if (coverImageInput) {
    coverImageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validate file size (10MB)
            if (file.size > 10 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 10MB.');
                e.target.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.getElementById('coverImagePreview');
                preview.src = event.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
}

// Cover Video Preview and Duration Validation
const coverVideoInput = document.getElementById('coverVideoInput');
if (coverVideoInput) {
    coverVideoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validate file size (10MB)
            if (file.size > 10 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 10MB.');
                e.target.value = '';
                return;
            }
            
            const video = document.createElement('video');
            video.preload = 'metadata';
            
            video.onloadedmetadata = function() {
                window.URL.revokeObjectURL(video.src);
                const duration = video.duration;
                
                if (duration > 5) {
                    document.getElementById('videoDurationWarning').classList.add('show');
                    e.target.value = '';
                } else {
                    document.getElementById('videoDurationWarning').classList.remove('show');
                    const preview = document.getElementById('coverVideoPreview');
                    preview.src = URL.createObjectURL(file);
                    preview.style.display = 'block';
                    preview.load();
                }
            };
            
            video.src = URL.createObjectURL(file);
        }
    });
}

// Delete Cover
function deleteCover() {
    if (confirm('Apakah Anda yakin ingin menghapus cover profil?')) {
        document.getElementById('deleteCoverFlag').value = '1';
        // Form will be submitted and page will reload
    }
}
</script>
@endsection
