# Testing Guide - Kustomisasi Profil Administrator

## Persiapan Testing

### 1. Pastikan Server Berjalan
```bash
php artisan serve
```

### 2. Login sebagai Admin
- Buka browser: `http://localhost:8000` atau `http://192.168.1.23:8000`
- Login dengan akun admin
- Role harus "admin"

---

## Test Case 1: Upload Foto Profil

### Langkah Testing
1. Dari dashboard admin, klik **"Profil Administrator"** di sidebar
2. Klik tombol **"Edit Profil"** (tombol kuning di kanan atas card header)
3. Scroll ke section **"Foto Profil"**
4. Klik tombol **"Upload Foto"**
5. Pilih file gambar (JPG/PNG/WEBP)
6. Perhatikan preview muncul langsung
7. Klik **"Simpan Perubahan"**
8. Redirect ke halaman profil
9. **Verifikasi**: Foto profil baru tampil di header profil

### Expected Result
- ✅ Preview muncul sebelum save
- ✅ Foto tersimpan di database
- ✅ Foto tampil di halaman profil
- ✅ Success message muncul: "Profil berhasil diperbarui."

### Edge Cases
- **Test file > 5MB**: Alert "Ukuran file terlalu besar" muncul
- **Test format tidak didukung**: Validasi browser reject file

---

## Test Case 2: Hapus Foto Profil

### Langkah Testing
1. Pastikan sudah ada foto profil yang terupload
2. Klik **"Edit Profil"**
3. Klik tombol **"Hapus Foto"** (tombol merah)
4. Konfirmasi penghapusan
5. Preview berubah ke avatar default (generated dari nama)
6. Klik **"Simpan Perubahan"**
7. **Verifikasi**: Foto profil kembali ke avatar default

### Expected Result
- ✅ Konfirmasi muncul
- ✅ Preview berubah ke default
- ✅ File lama terhapus dari storage
- ✅ Database field `profile_photo` menjadi NULL

---

## Test Case 3: Upload Cover Gambar

### Langkah Testing
1. Klik **"Edit Profil"**
2. Scroll ke section **"Cover Profil"**
3. Pastikan tab **"Gambar"** aktif (biru)
4. Klik area upload dashed border
5. Pilih file gambar (JPG/PNG/WEBP)
6. Perhatikan preview muncul
7. Klik **"Simpan Perubahan"**
8. **Verifikasi**: Cover gambar tampil sebagai background header profil

### Expected Result
- ✅ Preview muncul dengan border rounded
- ✅ Cover tersimpan di database
- ✅ Cover tampil di halaman profil sebagai background
- ✅ Teks profil tetap terbaca (ada overlay gelap)
- ✅ Success message muncul

### Visual Check
- Cover mengisi penuh area header tanpa distorsi
- `object-fit: cover` bekerja dengan baik
- Overlay gelap membuat teks tetap readable

---

## Test Case 4: Upload Cover Video

### Langkah Testing
1. Klik **"Edit Profil"**
2. Scroll ke section **"Cover Profil"**
3. Klik tab **"Video"**
4. Klik area upload
5. Pilih file video MP4/WEBM **maksimal 5 detik**
6. Perhatikan preview video muncul dan autoplay
7. Klik **"Simpan Perubahan"**
8. **Verifikasi**: Video tampil sebagai background header dengan autoplay

### Expected Result
- ✅ Preview video muncul dan play otomatis
- ✅ Video tersimpan di database
- ✅ Video tampil di halaman profil
- ✅ Video autoplay
- ✅ Video muted (tanpa suara)
- ✅ Video loop (berulang setelah selesai)
- ✅ Video tidak ada kontrol play/pause

### Visual Check
- Video mengisi penuh area header
- Video smooth playback
- Teks profil tetap terbaca di atas video

---

## Test Case 5: Validasi Durasi Video

### Langkah Testing
1. Klik **"Edit Profil"**
2. Tab **"Video"** aktif
3. Pilih video **lebih dari 5 detik**
4. **Verifikasi**: Warning muncul

### Expected Result
- ✅ Warning kuning muncul: **"Video melebihi durasi maksimal 5 detik"**
- ✅ File tidak diupload
- ✅ Input field di-reset
- ✅ User diminta pilih video lebih pendek

### How to Test
Buat video test:
- Video pendek (3 detik): ✅ Berhasil
- Video panjang (10 detik): ❌ Ditolak

---

## Test Case 6: Hapus Cover

### Langkah Testing
1. Pastikan sudah ada cover (gambar atau video)
2. Klik **"Edit Profil"**
3. Klik tombol **"Hapus Cover"** (tombol merah)
4. Konfirmasi penghapusan
5. Preview menghilang
6. Klik **"Simpan Perubahan"**
7. **Verifikasi**: Cover kembali ke gradient biru default

### Expected Result
- ✅ Konfirmasi muncul
- ✅ Preview cleared
- ✅ File lama terhapus dari storage
- ✅ Database fields `cover_file` dan `cover_type` menjadi NULL
- ✅ Default gradient biru tampil

---

## Test Case 7: Switch antara Image dan Video

### Langkah Testing
1. Klik **"Edit Profil"**
2. Upload cover gambar
3. Preview gambar muncul
4. Switch ke tab **"Video"**
5. **Verifikasi**: Gambar preview hilang, area upload video muncul
6. Upload video pendek
7. Preview video muncul
8. Switch kembali ke tab **"Gambar"**
9. **Verifikasi**: Video preview hilang

### Expected Result
- ✅ Tab switching bekerja smooth
- ✅ Input file di-reset saat switch tab
- ✅ Preview di-clear saat switch tab
- ✅ Hanya satu tipe cover yang bisa diupload

---

## Test Case 8: Responsiveness

### Desktop (1920x1080)
1. Buka halaman profil
2. **Check**:
   - Cover tampil full width
   - Avatar di kiri
   - Info di tengah
   - Button edit di kanan
   - Semua elemen aligned

### Tablet (768x1024)
1. Resize browser ke tablet size
2. **Check**:
   - Layout masih rapi
   - Cover masih full width
   - Elements stacking OK

### Mobile (375x667)
1. Resize browser ke mobile size
2. **Check**:
   - Card jadi vertical stack
   - Avatar di atas
   - Info di bawah
   - Button edit centered
   - Cover tetap full width

---

## Test Case 9: Multiple File Upload

### Langkah Testing
1. Upload foto profil
2. Upload cover gambar
3. **Simpan**
4. Edit lagi
5. Ganti foto profil dengan yang baru
6. Ganti cover dengan video
7. **Simpan**
8. **Verifikasi**: 
   - File lama terhapus
   - File baru tersimpan
   - Tidak ada duplikasi file

### Expected Result
- ✅ Old files deleted from storage
- ✅ New files saved
- ✅ No orphaned files

---

## Test Case 10: File Size Validation

### Client-Side Validation
1. Upload foto profil > 5MB
   - **Expected**: Alert "Ukuran file terlalu besar. Maksimal 5MB."

2. Upload cover > 10MB
   - **Expected**: Alert "Ukuran file terlalu besar. Maksimal 10MB."

### Server-Side Validation
1. Bypass client validation (via curl/postman)
2. Upload file oversized
   - **Expected**: Laravel validation error
   - **Expected**: Error message tampil di form

---

## Test Case 11: Concurrent Edit

### Scenario
Admin A dan Admin B edit profil bersamaan

### Langkah Testing
1. Login sebagai Admin A di browser 1
2. Login sebagai Admin B di browser 2
3. Keduanya buka edit profil
4. Admin A upload foto profil, save
5. Admin B upload cover, save
6. **Verifikasi**: 
   - Foto profil dari Admin A tersimpan
   - Cover dari Admin B tersimpan
   - Tidak ada data loss

### Expected Result
- ✅ Last update wins
- ✅ No database corruption
- ✅ Files saved correctly

---

## Test Case 12: Error Handling

### Test Scenarios

#### Storage Permission Error
1. Remove write permission dari `storage/app/public/`
2. Try upload
   - **Expected**: Error message muncul
   - **Expected**: User diberi tahu ada masalah

#### File Not Found
1. Manual delete file dari storage
2. Reload profil page
   - **Expected**: Fallback ke default avatar/cover
   - **Expected**: No broken images

#### Validation Errors
1. Submit form dengan field required kosong
   - **Expected**: Validation errors tampil
   - **Expected**: User tidak bisa submit

---

## Performance Testing

### Load Time
1. Upload large (tapi valid) file
2. Measure time to save
   - **Target**: < 3 seconds

### Page Render
1. Profile page dengan video cover
2. Measure first contentful paint
   - **Target**: < 2 seconds

### Video Autoplay
1. Profile page dengan video
2. Check video start time
   - **Expected**: Autoplay immediately on load

---

## Browser Compatibility

Test di browser berikut:

### Chrome/Edge (Chromium)
- ✅ Upload works
- ✅ Preview works
- ✅ Video autoplay works
- ✅ Validation works

### Firefox
- ✅ Upload works
- ✅ Preview works
- ✅ Video autoplay works
- ✅ Validation works

### Safari (if available)
- ✅ Upload works
- ✅ Preview works
- ✅ Video autoplay (need `playsinline`)
- ✅ Validation works

---

## Database Verification

### Check Data Saved
```sql
SELECT id, nama_lengkap, profile_photo, cover_type, cover_file 
FROM users 
WHERE role = 'admin';
```

### Expected Output
```
| id | nama_lengkap | profile_photo              | cover_type | cover_file              |
|----|--------------|----------------------------|------------|-------------------------|
| 1  | Admin Utama  | profile_photos/abc123.jpg  | video      | covers/xyz789.mp4       |
```

---

## Storage Verification

### Check Files Exist
```bash
# Check profile photos
ls storage/app/public/profile_photos/

# Check covers
ls storage/app/public/covers/
```

### Expected
- Files match database records
- No orphaned files
- Correct file extensions

---

## Security Testing

### File Type Bypass Attempt
1. Rename malicious.php to malicious.jpg
2. Try upload as profile photo
   - **Expected**: Laravel MIME validation rejects

### Path Traversal Attempt
1. Try upload with filename: `../../malicious.php`
   - **Expected**: Laravel sanitizes filename

### XSS Attempt
1. Try upload file with XSS in filename
   - **Expected**: Filename sanitized

---

## Rollback Testing

### Scenario: Cancel Edit
1. Upload new photo and cover
2. See previews
3. Click **"Batal"**
4. **Verifikasi**: Old data unchanged

### Scenario: Browser Back
1. Upload new files
2. See previews
3. Press browser back button
4. **Verifikasi**: Old data unchanged

---

## Success Criteria

### Functional ✅
- Upload foto profil berhasil
- Upload cover gambar berhasil
- Upload cover video berhasil (max 5 detik)
- Delete foto/cover berhasil
- Preview bekerja real-time
- Validasi client-side bekerja
- Validasi server-side bekerja

### Visual ✅
- Cover tampil penuh tanpa distorsi
- Video autoplay, muted, loop
- Overlay membuat teks readable
- Design konsisten dengan SIMAKATA
- Responsive di semua device

### Performance ✅
- Upload < 3 seconds
- Page load < 2 seconds
- Video playback smooth

### Security ✅
- File validation ketat
- No path traversal
- No XSS
- Proper permission handling

---

## Troubleshooting

### Issue: "The link already exists" saat storage:link
**Status**: Normal, link sudah ada
**Action**: No action needed

### Issue: File not found saat akses image
**Solution**: 
```bash
php artisan storage:link
```

### Issue: Video tidak autoplay
**Solution**: Pastikan attribute `muted` dan `playsinline` ada

### Issue: Preview tidak muncul
**Solution**: 
- Check browser console
- Check FileReader API support
- Check file MIME type

---

## Post-Testing Checklist

- [ ] Semua test case passed
- [ ] No console errors
- [ ] No database errors
- [ ] Files saved correctly
- [ ] Old files deleted correctly
- [ ] UI/UX konsisten
- [ ] Responsive works
- [ ] Performance acceptable
- [ ] Security validation passed
- [ ] Documentation complete

---

**Tested By**: _____________________
**Date**: _____________________
**Status**: ⬜ PASS | ⬜ FAIL
**Notes**: _____________________

