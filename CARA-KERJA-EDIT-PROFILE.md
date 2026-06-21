# Cara Kerja Edit Profile - Penjelasan Sistem

## Masalah Yang Ditemukan

Saat ini sistem edit profile memiliki beberapa masalah:

1. **Tombol DELETE tidak bekerja** - Karena menggunakan JavaScript yang complex
2. **Foto/Cover tidak ganti** - Logic delete dan upload bersamaan confusing
3. **Preview tidak update** - JavaScript events terlalu banyak

## Solusi Yang Akan Diterapkan

### Sistem Baru: SIMPLE & DIRECT

#### Untuk FOTO PROFIL:
```
JIKA SUDAH ADA FOTO:
- Tampilkan foto saat ini
- Tombol "Ganti Foto" → pilih file baru → otomatis replace
- Tombol "Hapus Foto" → submit form langsung → foto dihapus

JIKA BELUM ADA FOTO:
- Tampilkan avatar default (huruf)
- Tombol "Upload Foto" → pilih file → simpan
```

#### Untuk COVER PROFIL:
```
JIKA SUDAH ADA COVER (IMAGE/VIDEO):
- Tampilkan cover saat ini
- Label: "Cover yang Sedang Digunakan: Image/Video"
- Tombol "Ganti Cover" → pilih file baru (image atau video) → replace
- Tombol "Hapus Cover" → submit form langsung → cover dihapus

JIKA BELUM ADA COVER:
- Tab "Gambar" dan "Video"
- Area upload sesuai tab yang dipilih
- Upload → simpan
```

## Implementasi

### Controller Logic (SUDAH BENAR):
```php
// 1. Cek delete_profile_photo = 1 → hapus foto
// 2. Cek ada file profile_photo → upload baru
// 3. Cek delete_cover = 1 → hapus cover  
// 4. Cek ada file cover_file → upload baru
```

### View Logic (PERLU DIPERBAIKI):

**FOTO PROFIL:**
```blade
@if($admin->profile_photo)
    <!-- Ada foto -->
    <button type="submit" name="delete_profile_photo" value="1">
        Hapus Foto
    </button>
@endif
```

**Cara Kerja:**
- Klik "Hapus Foto" → form submit → controller terima `delete_profile_photo = 1` → hapus file → redirect
- Klik "Ganti Foto" → pilih file → klik "Simpan Perubahan" → controller terima file baru → replace

**COVER PROFIL:**
```blade
@if($admin->cover_file)
    <!-- Ada cover -->
    <button type="submit" name="delete_cover" value="1">
        Hapus Cover
    </button>
@endif
```

**Cara Kerja:**
- Klik "Hapus Cover" → form submit → controller terima `delete_cover = 1` → hapus file → redirect
- Klik "Ganti Cover" → pilih file (image/video) → klik "Simpan Perubahan" → replace

## Yang Perlu Diubah di View:

1. **Tombol Delete harus type="submit"** bukan JavaScript
2. **Tombol Delete harus punya name dan value** untuk dikirim ke controller
3. **Tidak perlu JavaScript complex** - simple aja
4. **Preview** hanya untuk file yang baru dipilih sebelum save

## Testing:

### Test Delete Foto:
1. Pastikan ada foto
2. Klik "Hapus Foto"
3. Halaman reload
4. Foto hilang, kembali ke default

### Test Ganti Foto:
1. Klik "Ganti Foto" atau "Upload Foto"
2. Pilih file baru
3. Klik "Simpan Perubahan"
4. Halaman reload
5. Foto baru tampil

### Test Delete Cover:
1. Pastikan ada cover
2. Klik "Hapus Cover"
3. Halaman reload
4. Cover hilang, kembali ke gradient

### Test Ganti Cover:
1. Klik "Ganti Cover"
2. Pilih file baru (image atau video)
3. Klik "Simpan Perubahan"  
4. Halaman reload
5. Cover baru tampil

## Kesimpulan:

**JANGAN** pakai JavaScript yang complex untuk delete.  
**PAKAI** simple form submit dengan name dan value.  
**CONTROLLER** sudah benar, tinggal fix view aja.

