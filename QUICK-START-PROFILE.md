# Quick Start Guide - Kustomisasi Profil Admin

## 🎯 Fitur Baru yang Tersedia

Sekarang administrator dapat:
1. ✅ **Upload Foto Profil** (JPG, PNG, WEBP, max 5MB)
2. ✅ **Upload Cover Gambar** (JPG, PNG, WEBP, max 10MB)
3. ✅ **Upload Cover Video** (MP4, WEBM, max 5 detik, max 10MB)
4. ✅ **Preview sebelum save**
5. ✅ **Hapus foto/cover**

---

## 🚀 Cara Menggunakan

### Step 1: Akses Halaman Profil
1. Login sebagai admin
2. Klik **"Profil Administrator"** di sidebar
3. Atau klik avatar Anda di pojok kiri bawah sidebar

### Step 2: Edit Profil
1. Klik tombol **"Edit Profil"** (tombol kuning di kanan atas)
2. Halaman edit profil akan terbuka

### Step 3: Upload Foto Profil (Opsional)
1. Scroll ke section **"Foto Profil"**
2. Klik tombol **"Upload Foto"**
3. Pilih file gambar dari komputer Anda
4. Preview akan muncul otomatis
5. Jika tidak suka, pilih file lain
6. Foto yang dipilih akan tersimpan saat Anda klik "Simpan Perubahan"

**Tips**: Gunakan foto dengan rasio 1:1 (kotak) untuk hasil terbaik

### Step 4: Upload Cover (Opsional)

#### Jika Ingin Upload Gambar:
1. Scroll ke section **"Cover Profil"**
2. Pastikan tab **"Gambar"** aktif (warna biru)
3. Klik area upload yang ada garis putus-putus
4. Pilih file gambar
5. Preview akan muncul otomatis
6. Gambar akan tersimpan saat Anda klik "Simpan Perubahan"

#### Jika Ingin Upload Video:
1. Scroll ke section **"Cover Profil"**
2. Klik tab **"Video"**
3. Klik area upload
4. Pilih file video (**maksimal 5 detik!**)
5. Jika video lebih dari 5 detik, akan muncul peringatan
6. Jika valid, preview video akan play otomatis
7. Video akan tersimpan saat Anda klik "Simpan Perubahan"

**PENTING**: Video harus maksimal 5 detik agar dashboard tetap ringan!

### Step 5: Simpan Perubahan
1. Setelah semua sesuai keinginan
2. Klik tombol **"Simpan Perubahan"** (tombol biru di bawah)
3. Anda akan di-redirect ke halaman profil
4. Lihat perubahan yang sudah tersimpan!

---

## 🖼️ Tampilan Hasil

### Halaman Profil Setelah Upload Cover Gambar:
```
┌─────────────────────────────────────────────────────────┐
│                                                         │
│         [GAMBAR COVER FULL WIDTH]                       │
│                                                         │
│  [Avatar]  Admin Utama              [Edit Profil]      │
│            System Administrator                         │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

### Halaman Profil Setelah Upload Cover Video:
```
┌─────────────────────────────────────────────────────────┐
│                                                         │
│         [VIDEO AUTOPLAY FULL WIDTH]                     │
│         (berulang terus tanpa suara)                    │
│                                                         │
│  [Avatar]  Admin Utama              [Edit Profil]      │
│            System Administrator                         │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

Cover (gambar/video) akan tampil sebagai background header profil dengan overlay gelap agar teks tetap terbaca.

---

## ⚙️ Cara Menghapus Foto/Cover

### Hapus Foto Profil:
1. Klik **"Edit Profil"**
2. Klik tombol **"Hapus Foto"** (tombol merah)
3. Konfirmasi penghapusan
4. Klik **"Simpan Perubahan"**
5. Foto akan kembali ke avatar default (generated dari nama)

### Hapus Cover:
1. Klik **"Edit Profil"**
2. Klik tombol **"Hapus Cover"** (tombol merah)
3. Konfirmasi penghapusan
4. Klik **"Simpan Perubahan"**
5. Cover akan kembali ke gradient biru default

---

## ❓ FAQ

### Q: Apakah wajib upload foto dan cover?
**A**: Tidak, keduanya opsional. Jika tidak diupload, akan menggunakan default (avatar generated dan gradient biru).

### Q: Format apa saja yang didukung untuk foto?
**A**: JPG, JPEG, PNG, WEBP. Maksimal 5MB.

### Q: Format apa saja yang didukung untuk cover?
**A**: 
- Gambar: JPG, JPEG, PNG, WEBP
- Video: MP4, WEBM
- Maksimal 10MB

### Q: Kenapa video saya ditolak?
**A**: Video maksimal 5 detik. Gunakan video yang lebih pendek atau trim video Anda terlebih dahulu.

### Q: Apakah video akan ada suara?
**A**: Tidak, video akan otomatis muted (tanpa suara) agar tidak mengganggu.

### Q: Apakah video akan loop?
**A**: Ya, video akan berulang terus secara otomatis setelah selesai.

### Q: Bagaimana jika saya ganti cover dari gambar ke video?
**A**: Tinggal switch tab ke "Video" dan upload. File gambar lama akan otomatis terhapus.

### Q: Apakah file lama akan terhapus otomatis?
**A**: Ya, saat Anda upload file baru, file lama akan otomatis terhapus dari server.

### Q: Apakah preview yang saya lihat adalah hasil akhir?
**A**: Ya, preview menunjukkan bagaimana file akan tampil setelah disimpan.

### Q: Bagaimana jika preview tidak muncul?
**A**: 
1. Refresh halaman dan coba lagi
2. Pastikan file format benar
3. Pastikan file size tidak melebihi batas
4. Cek browser console untuk error

### Q: Apakah perubahan langsung terlihat?
**A**: Ya, setelah klik "Simpan Perubahan", halaman profil akan reload dan menampilkan foto/cover baru.

### Q: Apakah foto/cover saya aman?
**A**: Ya, semua file disimpan di server dengan validasi ketat dan tidak bisa diakses langsung.

---

## ⚠️ Batasan dan Aturan

### Foto Profil:
- ✅ Format: JPG, JPEG, PNG, WEBP
- ✅ Ukuran maksimal: 5MB
- ✅ Rasio 1:1 (kotak) disarankan
- ❌ Format lain tidak didukung
- ❌ File > 5MB akan ditolak

### Cover Gambar:
- ✅ Format: JPG, JPEG, PNG, WEBP
- ✅ Ukuran maksimal: 10MB
- ✅ Landscape ratio disarankan
- ❌ Format lain tidak didukung
- ❌ File > 10MB akan ditolak

### Cover Video:
- ✅ Format: MP4, WEBM
- ✅ Ukuran maksimal: 10MB
- ✅ Durasi maksimal: 5 detik
- ✅ Codec H.264 untuk MP4 disarankan
- ❌ Format lain tidak didukung
- ❌ File > 10MB akan ditolak
- ❌ Video > 5 detik akan ditolak

---

## 💡 Tips & Trik

### Untuk Foto Profil Terbaik:
1. Gunakan foto dengan pencahayaan baik
2. Foto close-up wajah lebih baik
3. Background polos lebih professional
4. Hindari foto yang terlalu ramai
5. Ukuran 500x500px atau lebih besar

### Untuk Cover Gambar Terbaik:
1. Gunakan gambar landscape (horizontal)
2. Resolusi minimal 1920x400px
3. Hindari gambar dengan teks kecil (akan sulit dibaca)
4. Gunakan gambar dengan kontras baik
5. Background abstract atau gradient works well

### Untuk Cover Video Terbaik:
1. Durasi ideal: 3-5 detik
2. Resolusi: 1920x1080 atau 1280x720
3. Gunakan motion graphics atau animation
4. Hindari video yang terlalu ramai
5. Video loop harus seamless (awal dan akhir connect)
6. Compress video untuk ukuran lebih kecil

### Cara Membuat Video 5 Detik:
- **Windows**: Gunakan Windows Video Editor atau CapCut
- **Mac**: Gunakan iMovie atau QuickTime
- **Online**: Gunakan Clipchamp atau Kapwing
- Trim video Anda menjadi maksimal 5 detik sebelum upload

---

## 🛠️ Troubleshooting

### Problem: "Ukuran file terlalu besar"
**Solusi**: Compress file Anda atau pilih file yang lebih kecil.

### Problem: "Video melebihi durasi maksimal 5 detik"
**Solusi**: Trim video Anda menjadi lebih pendek atau pilih video lain.

### Problem: Preview tidak muncul
**Solusi**: 
1. Refresh halaman
2. Coba browser lain (Chrome/Edge/Firefox)
3. Clear browser cache

### Problem: Video tidak autoplay di halaman profil
**Solusi**: 
1. Refresh halaman
2. Video harus muted untuk autoplay (otomatis)
3. Cek browser settings untuk autoplay policy

### Problem: File tidak tersimpan
**Solusi**: 
1. Cek koneksi internet
2. Pastikan Anda sudah login
3. Cek apakah file format benar
4. Contact administrator jika masalah berlanjut

---

## 📱 Responsive Design

Fitur ini bekerja dengan baik di:
- ✅ Desktop (1920x1080 atau lebih besar)
- ✅ Laptop (1366x768 atau lebih besar)
- ✅ Tablet (768x1024)
- ✅ Mobile (375x667 atau lebih besar)

Layout akan otomatis menyesuaikan dengan ukuran layar Anda.

---

## 🎨 Design Guidelines

Untuk menjaga konsistensi visual SIMAKATA:
- Gunakan foto/cover yang professional
- Hindari konten yang tidak pantas
- Gunakan warna yang tidak terlalu mencolok
- Pertimbangkan readability teks di atas cover
- Ikuti branding institusi jika ada

---

## ✅ Checklist Sebelum Upload

### Foto Profil:
- [ ] Format JPG/PNG/WEBP
- [ ] Ukuran < 5MB
- [ ] Foto professional
- [ ] Pencahayaan baik
- [ ] Wajah terlihat jelas

### Cover Gambar:
- [ ] Format JPG/PNG/WEBP
- [ ] Ukuran < 10MB
- [ ] Landscape ratio
- [ ] Resolusi tinggi
- [ ] Kontras baik untuk text readability

### Cover Video:
- [ ] Format MP4/WEBM
- [ ] Ukuran < 10MB
- [ ] Durasi < 5 detik
- [ ] Loop seamless
- [ ] Motion smooth
- [ ] Professional content

---

## 🎓 Best Practices

1. **Update Regular**: Update foto profil secara berkala
2. **Professional**: Gunakan foto/cover yang professional
3. **Brand Consistency**: Sesuaikan dengan branding institusi
4. **Performance**: Gunakan file size sekecil mungkin tanpa mengorbankan kualitas
5. **Accessibility**: Pertimbangkan kontras warna untuk readability

---

## 📞 Butuh Bantuan?

Jika Anda mengalami kesulitan:
1. Baca FAQ di atas
2. Cek Troubleshooting section
3. Coba browser lain
4. Contact IT support institusi

---

**Selamat mencoba fitur baru ini! 🎉**

Buat profil administrator Anda lebih personal dan professional dengan foto dan cover kustom.

---

**Last Updated**: 21 Juni 2026
**Version**: 1.0.0
