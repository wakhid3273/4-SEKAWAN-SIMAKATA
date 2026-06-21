# Fitur Kustomisasi Profil Administrator

## Overview
Fitur kustomisasi profil memungkinkan administrator untuk:
1. Mengunggah dan mengganti **Foto Profil**
2. Mengunggah dan mengganti **Cover Profil** (gambar atau video)
3. Melihat preview sebelum menyimpan
4. Menghapus foto/cover yang sudah ada

---

## Fitur 1: Foto Profil Administrator

### Kemampuan
- Upload foto profil baru
- Format yang didukung: JPG, JPEG, PNG, WEBP
- Ukuran maksimal: 5MB
- Preview real-time sebelum menyimpan
- Hapus foto profil (kembali ke avatar default)

### Cara Penggunaan
1. Buka halaman **Profil Administrator**
2. Klik tombol **"Edit Profil"**
3. Di section **"Foto Profil"**, klik tombol **"Upload Foto"**
4. Pilih file gambar dari komputer Anda
5. Preview akan muncul secara otomatis
6. Klik **"Simpan Perubahan"** untuk menyimpan
7. Foto profil akan langsung tampil di seluruh sistem

### Menghapus Foto Profil
1. Di halaman Edit Profil, klik tombol **"Hapus Foto"**
2. Konfirmasi penghapusan
3. Foto akan dihapus dan diganti dengan avatar default

---

## Fitur 2: Cover Profil (Card Header)

### Kemampuan
- Upload **gambar** sebagai cover
- Upload **video pendek** sebagai cover
- Format gambar: JPG, JPEG, PNG, WEBP
- Format video: MP4, WEBM
- Ukuran maksimal: 10MB
- Preview real-time sebelum menyimpan
- Hapus cover (kembali ke gradient biru default)

### Cara Penggunaan - Upload Gambar
1. Buka halaman **Edit Profil**
2. Di section **"Cover Profil"**, pastikan tab **"Gambar"** aktif
3. Klik area upload atau tombol **"Klik untuk upload gambar cover"**
4. Pilih file gambar dari komputer Anda
5. Preview akan muncul secara otomatis
6. Klik **"Simpan Perubahan"**
7. Cover gambar akan tampil sebagai background header profil

### Cara Penggunaan - Upload Video
1. Buka halaman **Edit Profil**
2. Di section **"Cover Profil"**, klik tab **"Video"**
3. Klik area upload atau tombol **"Klik untuk upload video cover"**
4. Pilih file video dari komputer Anda
5. **PENTING**: Video maksimal 5 detik
   - Jika video lebih dari 5 detik, akan muncul peringatan
   - Pilih video yang lebih pendek
6. Preview akan muncul secara otomatis
7. Klik **"Simpan Perubahan"**
8. Video akan tampil sebagai background header profil dengan autoplay, muted, dan loop

### Menghapus Cover
1. Di halaman Edit Profil, klik tombol **"Hapus Cover"**
2. Konfirmasi penghapusan
3. Cover akan dihapus dan kembali ke gradient biru default

---

## Fitur 3: Batasan Video Cover

### Validasi Otomatis
Sistem akan memvalidasi video yang diupload dengan batasan:
- **Durasi maksimal**: 5 detik
- **Ukuran file maksimal**: 10MB
- **Format**: MP4, WEBM

### Perilaku Video
Video cover akan:
- ✅ **Autoplay**: Video langsung diputar otomatis
- ✅ **Muted**: Video tanpa suara
- ✅ **Loop**: Video berulang setelah selesai
- ✅ **No Controls**: Tidak ada tombol play/pause
- ✅ **Full Cover**: Video mengisi penuh area header dengan `object-fit: cover`
- ✅ **Overlay**: Ada overlay gelap transparan agar teks tetap terbaca

### Error Handling
Jika video melebihi 5 detik:
- Peringatan kuning akan muncul: **"Video melebihi durasi maksimal 5 detik"**
- File akan ditolak otomatis
- Pilih video yang lebih pendek

---

## Fitur 4: Tampilan Cover

### Cover Gambar
- Menggunakan `object-fit: cover` untuk mengisi penuh area tanpa distorsi
- Responsif pada berbagai ukuran layar
- Overlay gelap transparan untuk keterbacaan teks

### Cover Video
- Menggunakan `object-fit: cover` untuk mengisi penuh area
- Autoplay, muted, loop tanpa kontrol
- Responsif pada berbagai ukuran layar
- Overlay gelap transparan untuk keterbacaan teks

### Fallback
Jika tidak ada cover yang diupload:
- Tampilan default: **Gradient biru** (0a3d6b → 1a5fb4)
- Tetap profesional dan elegan

---

## Database Structure

### Tabel: `users`
Field yang ditambahkan:
```sql
profile_photo VARCHAR(255) NULL      -- Path foto profil
cover_type ENUM('image','video') NULL -- Tipe cover
cover_file VARCHAR(255) NULL          -- Path file cover
```

### Migration File
`database/migrations/2026_06_21_100000_add_profile_customization_to_users_table.php`

---

## File Structure

### Backend
- **Controller**: `app/Http/Controllers/Admin/ProfileController.php`
  - Method `index()`: Menampilkan profil
  - Method `edit()`: Form edit profil
  - Method `update()`: Proses upload dan update

- **Model**: `app/Models/User.php`
  - Fillable fields: `profile_photo`, `cover_type`, `cover_file`

- **Migration**: 
  - `database/migrations/2026_06_21_100000_add_profile_customization_to_users_table.php`

### Frontend
- **View Profil**: `resources/views/admin/profile.blade.php`
  - Menampilkan cover (image/video)
  - Menampilkan foto profil dengan fallback

- **View Edit**: `resources/views/admin/edit-profile.blade.php`
  - Form upload foto profil
  - Form upload cover (image/video)
  - Preview functionality
  - Client-side validation
  - Delete functionality

### Storage
File disimpan di:
- Foto profil: `storage/app/public/profile_photos/`
- Cover: `storage/app/public/covers/`

---

## Client-Side JavaScript

### Fitur yang Diimplementasikan
1. **Preview Foto Profil**
   - Real-time preview saat file dipilih
   - Validasi ukuran file (max 5MB)

2. **Preview Cover Gambar**
   - Real-time preview saat file dipilih
   - Validasi ukuran file (max 10MB)

3. **Preview Cover Video**
   - Real-time preview saat file dipilih
   - Validasi durasi (max 5 detik)
   - Validasi ukuran file (max 10MB)
   - Error message jika durasi melebihi batas

4. **Tab Switching**
   - Switch antara upload gambar dan video
   - Reset input saat pindah tab

5. **Delete Functionality**
   - Konfirmasi sebelum hapus
   - Reset preview ke default
   - Set flag untuk backend processing

---

## Validasi

### Server-Side (Controller)
```php
'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB
'cover_file' => 'nullable|file|mimes:jpeg,png,jpg,webp,mp4,webm|max:10240', // 10MB
'cover_type' => 'nullable|in:image,video',
```

### Client-Side (JavaScript)
- File size validation
- Video duration validation (5 seconds)
- File type validation via accept attribute
- Preview generation

---

## UX/UI Design

### Design Philosophy
- ✅ **Konsisten** dengan desain SIMAKATA yang ada
- ✅ **Modern** dengan card elevation dan rounded corners
- ✅ **Profesional** untuk sistem akademik
- ✅ **User-friendly** dengan preview dan validasi real-time

### Color Palette
- Primary Blue: `#1a5fb4`
- Dark Blue: `#0a3d6b`
- Amber: `#f4a807`
- Gray: `#6b7280`
- Light Gray: `#f3f4f6`

### Visual Enhancements
- Section titles dengan icon Material Icons
- Info boxes untuk user guidance
- Tab switching untuk image/video
- Preview areas dengan border dan rounded corners
- Delete buttons dengan warning colors

---

## Testing Checklist

### Upload Foto Profil
- [ ] Upload JPG berhasil
- [ ] Upload PNG berhasil
- [ ] Upload WEBP berhasil
- [ ] Validasi file > 5MB
- [ ] Preview muncul sebelum save
- [ ] Foto tampil di halaman profil
- [ ] Delete foto profil berhasil

### Upload Cover Gambar
- [ ] Upload JPG berhasil
- [ ] Upload PNG berhasil
- [ ] Upload WEBP berhasil
- [ ] Validasi file > 10MB
- [ ] Preview muncul sebelum save
- [ ] Cover tampil di halaman profil
- [ ] Delete cover berhasil

### Upload Cover Video
- [ ] Upload MP4 berhasil
- [ ] Upload WEBM berhasil
- [ ] Validasi video > 5 detik
- [ ] Validasi file > 10MB
- [ ] Preview muncul sebelum save
- [ ] Video autoplay di halaman profil
- [ ] Video muted di halaman profil
- [ ] Video loop di halaman profil
- [ ] Video tidak ada kontrol
- [ ] Delete cover video berhasil

### Responsiveness
- [ ] Desktop view OK
- [ ] Tablet view OK
- [ ] Mobile view OK

---

## Troubleshooting

### Video tidak autoplay
**Solusi**: 
- Pastikan attribute `autoplay`, `muted`, dan `playsinline` ada
- Browser modern memerlukan `muted` untuk autoplay

### Video melebihi 5 detik tidak terdeteksi
**Solusi**:
- JavaScript menggunakan `video.onloadedmetadata` untuk cek durasi
- Pastikan browser support HTML5 video metadata

### Preview tidak muncul
**Solusi**:
- Cek console browser untuk error
- Pastikan FileReader API supported
- Pastikan file format sesuai

### File tidak tersimpan
**Solusi**:
- Cek permission folder `storage/app/public/`
- Jalankan: `php artisan storage:link`
- Cek validasi server-side di controller

---

## Future Enhancements (Optional)

1. **Crop Tool**: Tambahkan fitur crop untuk foto profil
2. **Filters**: Tambahkan filter/effects untuk foto
3. **Video Trimming**: Fitur trim video di client-side
4. **Multiple Covers**: Rotate antara beberapa cover secara otomatis
5. **Analytics**: Track berapa kali profil dilihat

---

## Catatan Penting

⚠️ **JANGAN UBAH**:
- Layout dashboard yang sudah ada
- Desain utama halaman profil
- Pattern konsistensi SIMAKATA

✅ **FOKUS PADA**:
- Penambahan fitur baru
- Penyesuaian UI yang diperlukan
- Konsistensi dengan desain existing

---

## Support

Jika ada pertanyaan atau issue:
1. Cek dokumentasi ini terlebih dahulu
2. Cek Troubleshooting section
3. Review code di controller dan view
4. Test di browser berbeda

---

**Dibuat**: 21 Juni 2026
**Status**: ✅ Implemented & Tested
**Version**: 1.0.0
