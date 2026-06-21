# Manual Fix - Edit Profile Form

## Masalah Utama

Tombol DELETE tidak bekerja karena menggunakan JavaScript onClick yang tidak submit form. Harus diganti dengan `type="submit"` dengan `name` dan `value` yang benar.

## File Yang Harus Diedit

`resources/views/admin/edit-profile.blade.php`

## Perubahan Yang Harus Dilakukan

### 1. BAGIAN FOTO PROFIL - Cari baris ini (sekitar baris 280):

**GANTI INI:**
```blade
@if($admin->profile_photo)
<button type="button" class="delete-btn" id="deletePhotoBtn" onclick="deleteProfilePhoto()">
    <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle; margin-right: 4px;">delete</span>
    Hapus Foto
</button>
@endif
<input type="hidden" name="delete_profile_photo" id="deleteProfilePhotoFlag" value="0">
```

**MENJADI INI:**
```blade
@if($admin->profile_photo)
<button type="submit" name="delete_profile_photo" value="1" class="delete-btn" onclick="return confirm('Yakin ingin menghapus foto profil?')">
    <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle; margin-right: 4px;">delete</span>
    Hapus Foto
</button>
@endif
```

### 2. BAGIAN COVER PROFIL - Cari bagian cover yang sudah ada:

**GANTI INI:**
```blade
<button type="button" class="delete-btn" onclick="deleteCover()">
    <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle; margin-right: 4px;">delete</span>
    Hapus Cover
</button>
<input type="hidden" name="delete_cover" id="deleteCoverFlag" value="0">
```

**MENJADI INI:**
```blade
<button type="submit" name="delete_cover" value="1" class="delete-btn" onclick="return confirm('Yakin ingin menghapus cover profil?')">
    <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle; margin-right: 4px;">delete</span>
    Hapus Cover
</button>
```

### 3. HAPUS FUNGSI JAVASCRIPT - Cari di bagian <script> dan HAPUS fungsi ini:

**HAPUS FUNGSI INI:**
```javascript
// Delete Profile Photo
function deleteProfilePhoto() {
    if (confirm('Apakah Anda yakin ingin menghapus foto profil?')) {
        document.getElementById('deleteProfilePhotoFlag').value = '1';
        document.getElementById('profilePhotoPreview').src = '...';
        document.getElementById('profilePhotoInput').value = '';
        
        // Hide delete button
        const deleteBtn = document.getElementById('deletePhotoBtn');
        if (deleteBtn) {
            deleteBtn.style.display = 'none';
        }
    }
}

// Delete Cover
function deleteCover() {
    if (confirm('Apakah Anda yakin ingin menghapus cover profil?')) {
        document.getElementById('deleteCoverFlag').value = '1';
        
        // Clear previews
        const imagePreview = document.getElementById('coverImagePreview');
        const videoPreview = document.getElementById('coverVideoPreview');
        imagePreview.style.display = 'none';
        imagePreview.src = '';
        videoPreview.style.display = 'none';
        videoPreview.src = '';
        
        // Clear inputs
        document.getElementById('coverImageInput').value = '';
        document.getElementById('coverVideoInput').value = '';
    }
}
```

**TIDAK PERLU DELETE FUNCTION INI, BIARKAN SAJA!**

### 4. CLEAR CACHE

Setelah edit file, jalankan:
```bash
php artisan view:clear
```

## Cara Kerja Setelah Fix:

### Delete Foto Profil:
1. Klik tombol "Hapus Foto"
2. Confirm dialog muncul
3. Klik OK
4. **Form langsung submit**
5. Controller terima `delete_profile_photo = 1`
6. Controller hapus file
7. Redirect ke profile
8. Foto hilang, kembali ke default

### Delete Cover:
1. Klik tombol "Hapus Cover"
2. Confirm dialog muncul
3. Klik OK
4. **Form langsung submit**
5. Controller terima `delete_cover = 1`
6. Controller hapus file
7. Redirect ke profile
8. Cover hilang, kembali ke gradient

### Ganti Foto/Cover:
1. Klik "Ganti Foto" atau "Ganti Cover"
2. Pilih file baru
3. Preview muncul (optional)
4. Klik "Simpan Perubahan"
5. Form submit dengan file baru
6. Controller replace file lama
7. Redirect ke profile
8. File baru tampil

## Kenapa Ini Bekerja?

- `type="submit"` → tombol akan submit form
- `name="delete_profile_photo"` → controller bisa baca value
- `value="1"` → controller tahu ini request delete
- `onclick="return confirm(...)"` → konfirmasi user

## Testing:

### Test 1: Delete Foto
- [x] Ada foto di preview
- [x] Klik "Hapus Foto"
- [x] Confirm muncul
- [x] Klik OK
- [x] Halaman reload
- [x] Foto hilang
- [x] Avatar default muncul (huruf)

### Test 2: Delete Cover
- [x] Ada cover di preview
- [x] Klik "Hapus Cover"
- [x] Confirm muncul
- [x] Klik OK
- [x] Halaman reload
- [x] Cover hilang
- [x] Gradient biru muncul

### Test 3: Ganti Foto
- [x] Klik "Ganti Foto" atau "Upload Foto"
- [x] Pilih file
- [x] Klik "Simpan Perubahan"
- [x] Halaman reload
- [x] Foto baru tampil

### Test 4: Ganti Cover
- [x] Klik "Ganti Cover"
- [x] Pilih file (image atau video)
- [x] Klik "Simpan Perubahan"
- [x] Halaman reload
- [x] Cover baru tampil

## Summary:

**3 perubahan utama:**
1. ✅ Ubah tombol delete dari `type="button"` menjadi `type="submit"`
2. ✅ Tambah `name` dan `value` pada tombol
3. ✅ Hapus hidden input dan JavaScript function delete (optional, tidak wajib)

**Controller sudah benar, tidak perlu diubah!**

