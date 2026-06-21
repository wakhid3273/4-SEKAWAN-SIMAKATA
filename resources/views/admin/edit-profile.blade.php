@extends('layouts.admin')

@section('title', 'Edit Profil Admin')

@section('extra_styles')
<style>
    /* Main Container */
    .edit-profile-container {
        max-width: 960px;
        margin: 0 auto;
    }
    
    .card-edit {
        background: white;
        border: 1px solid rgba(0,0,0,0.04);
        border-radius: 14px;
        padding: 32px 40px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
        margin-bottom: 24px;
        /* Premium Enhancement */
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    /* Subtle Hover Effect */
    .card-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08), 0 2px 4px rgba(0, 0, 0, 0.04);
        border-color: rgba(26, 95, 180, 0.1);
    }
    
    .section-title {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 24px;
        padding-bottom: 12px;
        border-bottom: 2px solid #f3f4f6;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .section-title .material-icons-outlined {
        color: #1a5fb4;
        font-size: 22px;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin-bottom: 24px;
    }
    
    .form-row-full {
        margin-bottom: 24px;
    }
    
    .form-group {
        margin-bottom: 0;
    }
    
    .form-label {
        display: block;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: #6b7280;
        margin-bottom: 8px;
    }
    
    .form-input {
        width: 100%;
        padding: 11px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        font-size: 13px;
        font-family: inherit;
        color: #111827;
        background: #fff;
        transition: all 0.2s;
    }
    .form-input:focus {
        outline: none;
        border-color: #1a5fb4;
        box-shadow: 0 0 0 3px rgba(26,95,180,0.1);
    }
    .form-input::placeholder {
        color: #9ca3af;
    }
    
    /* Buttons */
    .btn-submit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #1a5fb4;
        color: white;
        padding: 12px 28px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.2s;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .btn-submit:hover {
        background: #1450a0;
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
        margin-left: 12px;
        color: #6b7280;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }
    .btn-cancel:hover {
        color: #374151;
    }
    
    /* Profile Photo Section */
    .profile-photo-section {
        display: flex;
        align-items: flex-start;
        gap: 24px;
        padding: 24px;
        background: #f9fafb;
        border-radius: 12px;
        border: 1px solid #f3f4f6;
        transition: all 0.3s ease;
    }
    
    /* Subtle Hover */
    .profile-photo-section:hover {
        background: #f3f4f6;
        border-color: #e5e7eb;
    }
    
    .profile-photo-preview-wrapper {
        flex-shrink: 0;
    }
    
    .profile-photo-preview {
        width: 120px;
        height: 120px;
        border-radius: 16px;
        object-fit: cover;
        border: 3px solid #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Avatar Hover */
    .profile-photo-preview-wrapper:hover .profile-photo-preview {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    
    .profile-photo-actions {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    
    .photo-actions-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .upload-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 18px;
        background: #fff;
        color: #1a5fb4;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border: 1.5px solid #1a5fb4;
        transition: all 0.2s;
    }
    .upload-btn:hover {
        background: #e8f0fb;
    }
    .upload-btn .material-icons-outlined {
        font-size: 16px;
    }
    
    .delete-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 18px;
        background: #fff;
        color: #dc2626;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border: 1.5px solid #fecaca;
        transition: all 0.2s;
    }
    .delete-btn:hover {
        background: #fef2f2;
        border-color: #dc2626;
    }
    .delete-btn .material-icons-outlined {
        font-size: 16px;
    }
    
    /* Cover Section */
    .cover-section-divider {
        margin: 40px 0;
        padding-top: 40px;
        border-top: 2px solid #f3f4f6;
    }
    
    .cover-tabs {
        display: flex;
        gap: 12px;
        margin-bottom: 20px;
    }
    
    .cover-tab {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 20px;
        background: #f9fafb;
        color: #6b7280;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border: 2px solid #f3f4f6;
        transition: all 0.2s;
    }
    .cover-tab .material-icons-outlined {
        font-size: 18px;
    }
    .cover-tab.active {
        background: #e8f0fb;
        color: #1a5fb4;
        border-color: #1a5fb4;
    }
    .cover-tab:hover:not(.active) {
        background: #f3f4f6;
        border-color: #e5e7eb;
    }
    
    .cover-preview {
        width: 100%;
        max-height: 280px;
        border-radius: 12px;
        object-fit: cover;
        border: 2px solid #f3f4f6;
        margin-top: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    
    .cover-upload-area {
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        padding: 48px 32px;
        text-align: center;
        background: #fafbfc;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .cover-upload-area:hover {
        border-color: #1a5fb4;
        background: #f0f5fb;
        transform: translateY(-2px);
    }
    .cover-upload-area .material-icons-outlined {
        font-size: 56px;
        color: #d1d5db;
        margin-bottom: 16px;
    }
    .cover-upload-area .upload-title {
        font-weight: 600;
        color: #374151;
        font-size: 14px;
        margin-bottom: 6px;
    }
    .cover-upload-info {
        font-size: 12px;
        color: #9ca3af;
    }
    
    .current-cover-label {
        margin-bottom: 16px;
        font-size: 13px;
        color: #6b7280;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .current-cover-label span {
        color: #1a5fb4;
    }
    
    .video-duration-warning {
        background: #fef3c7;
        border: 1px solid #fbbf24;
        color: #92400e;
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 12px;
        margin-top: 12px;
        display: none;
        align-items: center;
        gap: 8px;
    }
    .video-duration-warning.show {
        display: flex;
    }
    .video-duration-warning .material-icons-outlined {
        font-size: 18px;
        color: #d97706;
    }
    
    .info-box {
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 12px;
        color: #0c4a6e;
        display: flex;
        align-items: start;
        gap: 10px;
        line-height: 1.6;
        transition: all 0.3s ease;
    }
    
    .info-box:hover {
        background: #e0f2fe;
        border-color: #7dd3fc;
    }
    
    .info-box .material-icons-outlined {
        font-size: 18px;
        color: #0284c7;
        flex-shrink: 0;
        margin-top: 1px;
    }
    
    /* Form Actions */
    .form-actions {
        margin-top: 40px;
        padding-top: 28px;
        border-top: 2px solid #f3f4f6;
        display: flex;
        align-items: center;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .card-edit {
            padding: 24px 20px;
        }
        .form-row {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .profile-photo-section {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .photo-actions-buttons {
            justify-content: center;
        }
        .form-actions {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }
        .btn-submit,
        .btn-cancel {
            width: 100%;
            justify-content: center;
            margin-left: 0;
        }
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Profil Administrator</h1>
        <p class="subtitle">Perbarui informasi profil dan kustomisasi tampilan Anda.</p>
    </div>
</div>

@if(session('success'))
<div style="background: #d1fae5; border: 1px solid #6ee7b7; color: #065f46; padding: 14px 18px; border-radius: 10px; margin-bottom: 24px; display: flex; align-items: center; gap: 10px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
    <span class="material-icons-outlined" style="font-size: 20px; color: #10b981;">check_circle</span>
    <span style="font-weight: 600; font-size: 13px;">{{ session('success') }}</span>
</div>
@endif

@if($errors->any())
<div style="background: #fee2e2; border: 1px solid #fecaca; color: #991b1b; padding: 14px 18px; border-radius: 10px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);">
    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
        <span class="material-icons-outlined" style="font-size: 20px; color: #dc2626;">error</span>
        <span style="font-weight: 600; font-size: 13px;">Terdapat kesalahan:</span>
    </div>
    <ul style="margin: 0; padding-left: 32px; font-size: 12px;">
        @foreach($errors->all() as $error)
        <li style="margin-bottom: 4px;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="edit-profile-container">
    <div class="card-edit">
        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" id="profileForm">
            @csrf
            @method('PUT')
            
            <!-- Informasi Profil Section -->
            <div class="section-title">
                <span class="material-icons-outlined">badge</span>
                Informasi Profil
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap *</label>
                    <input type="text" name="nama_lengkap" class="form-input" value="{{ old('nama_lengkap', $admin->nama_lengkap) }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-input" value="{{ old('email', $admin->email) }}" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">ID Administrator (NIM) *</label>
                    <input type="text" name="nim" class="form-input" value="{{ old('nim', $admin->nim) }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password Baru (Opsional)</label>
                    <input type="password" name="password" class="form-input" placeholder="Kosongkan jika tidak ingin mengubah">
                </div>
            </div>
            
            <!-- Foto Profil Section -->
            <div class="cover-section-divider">
                <div class="section-title">
                    <span class="material-icons-outlined">account_circle</span>
                    Foto Profil
                </div>
                
                <div class="profile-photo-section">
                    <div class="profile-photo-preview-wrapper">
                        <img id="profilePhotoPreview" 
                             src="{{ $admin->profile_photo ? Storage::url($admin->profile_photo) : 'https://ui-avatars.com/api/?name=' . urlencode($admin->nama_lengkap ?? 'Admin') . '&background=1a5fb4&color=fff&size=240' }}" 
                             alt="Profile Photo" 
                             class="profile-photo-preview">
                    </div>
                    <div class="profile-photo-actions">
                        <div class="photo-actions-buttons">
                            <input type="file" id="profilePhotoInput" name="profile_photo" accept="image/jpeg,image/png,image/jpg,image/webp" style="display: none;">
                            <label for="profilePhotoInput" class="upload-btn">
                                <span class="material-icons-outlined">upload</span>
                                Upload Foto
                            </label>
                            @if($admin->profile_photo)
                            <button type="submit" name="delete_profile_photo" value="1" class="delete-btn" onclick="return confirm('Yakin ingin menghapus foto profil?')">
                                <span class="material-icons-outlined">delete</span>
                                Hapus Foto
                            </button>
                            @endif
                        </div>
                        <div class="info-box">
                            <span class="material-icons-outlined">info</span>
                            <span>Format: JPG, JPEG, PNG, WEBP. Maksimal 5MB. Rasio 1:1 disarankan untuk hasil terbaik.</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Cover Profil Section -->
            <div class="cover-section-divider">
                <div class="section-title">
                    <span class="material-icons-outlined">wallpaper</span>
                    Cover Profil
                </div>
                
                @if($admin->cover_file)
                    <!-- Tampilkan cover yang sedang digunakan -->
                    <div id="currentCoverDisplay">
                        <div class="current-cover-label">
                            Cover yang Sedang Digunakan: 
                            <span>{{ $admin->cover_type === 'video' ? 'Video' : 'Gambar' }}</span>
                        </div>
                        
                        @if($admin->cover_type === 'video')
                            <video src="{{ Storage::url($admin->cover_file) }}" class="cover-preview" autoplay muted loop preload="auto">
                                <source src="{{ Storage::url($admin->cover_file) }}" type="video/mp4">
                            </video>
                        @else
                            <img src="{{ Storage::url($admin->cover_file) }}" alt="Cover" class="cover-preview">
                        @endif
                        
                        <div style="margin-top: 16px;">
                            <button type="submit" name="delete_cover" value="1" class="delete-btn" onclick="return confirm('Yakin ingin menghapus cover profil?')">
                                <span class="material-icons-outlined">delete</span>
                                Hapus Cover
                            </button>
                        </div>
                    </div>
                @else
                    <!-- Tidak ada cover, tampilkan upload area -->
                    <div class="cover-tabs">
                        <div class="cover-tab active" id="imageTab" onclick="switchCoverTab('image')">
                            <span class="material-icons-outlined">image</span>
                            Gambar
                        </div>
                        <div class="cover-tab" id="videoTab" onclick="switchCoverTab('video')">
                            <span class="material-icons-outlined">videocam</span>
                            Video
                        </div>
                    </div>
                    
                    <input type="hidden" name="cover_type" id="coverType" value="image">
                    
                    <!-- Image Upload -->
                    <div id="imageUploadSection">
                        <input type="file" id="coverImageInput" name="cover_file" accept="image/jpeg,image/png,image/jpg,image/webp" style="display: none;">
                        <label for="coverImageInput" class="cover-upload-area">
                            <span class="material-icons-outlined">add_photo_alternate</span>
                            <div class="upload-title">Klik untuk upload gambar cover</div>
                            <div class="cover-upload-info">Format: JPG, JPEG, PNG, WEBP. Maksimal 10MB.</div>
                        </label>
                        <img id="coverImagePreview" src="" alt="Cover Preview" class="cover-preview" style="display: none;">
                    </div>
                    
                    <!-- Video Upload -->
                    <div id="videoUploadSection" style="display: none;">
                        <input type="file" id="coverVideoInput" name="cover_file" accept="video/mp4,video/webm" style="display: none;">
                        <label for="coverVideoInput" class="cover-upload-area">
                            <span class="material-icons-outlined">videocam</span>
                            <div class="upload-title">Klik untuk upload video cover</div>
                            <div class="cover-upload-info">Format: MP4, WEBM. Maksimal 5 detik, 10MB.</div>
                        </label>
                        <video id="coverVideoPreview" src="" class="cover-preview" autoplay muted loop style="display: none;"></video>
                        <div class="video-duration-warning" id="videoDurationWarning">
                            <span class="material-icons-outlined">warning</span>
                            <span>Video melebihi durasi maksimal 5 detik. Pilih video yang lebih pendek.</span>
                        </div>
                    </div>
                @endif
                
                <div class="info-box" style="margin-top: 16px;">
                    <span class="material-icons-outlined">info</span>
                    <span>Cover akan tampil sebagai background header profil. Video akan autoplay, muted, dan loop.</span>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-submit">
                    <span class="material-icons-outlined">save</span>
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.profil') }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
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
