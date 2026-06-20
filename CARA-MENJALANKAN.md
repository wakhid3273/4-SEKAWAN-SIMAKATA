# 🚀 Cara Menjalankan SIMAKATA

## ⚠️ PENTING: Baca Ini Terlebih Dahulu!

SIMAKATA memiliki **2 mode** operasi:

### Mode 1: TANPA Real-time (Aplikasi Biasa)
Aplikasi berfungsi normal, tapi perubahan data tidak otomatis ter-update. User harus refresh halaman manual.

### Mode 2: DENGAN Real-time (Recommended)
Aplikasi berfungsi dengan fitur real-time. Perubahan data langsung terlihat di semua device tanpa refresh.

---

## 📝 Mode 1: Tanpa Real-time (Quick Start)

### Langkah 1: Jalankan Laravel Server

Buka Command Prompt atau Terminal, lalu jalankan:

```bash
php artisan serve
```

✅ **Website siap diakses di: http://127.0.0.1:8000**

### Catatan:
- Aplikasi berfungsi **100% normal**
- Admin bisa CRUD data
- User bisa lihat dan ajukan
- **TIDAK ADA** update otomatis (harus refresh manual)
- **TIDAK AKAN ERROR** karena broadcasting sudah di-handle dengan graceful failure

---

## 🚀 Mode 2: Dengan Real-time (Full Features)

Untuk mengaktifkan fitur real-time, Anda harus menjalankan **3 server**:

### Langkah 1: Jalankan Laravel Server

**Terminal/CMD 1:**
```bash
php artisan serve
```

### Langkah 2: Jalankan Reverb Server (WebSocket)

**Terminal/CMD 2:**
```bash
php artisan reverb:start
```

**ATAU** double-click file `START-REVERB.bat`

### Langkah 3: Jalankan Vite (Hot Reload - Opsional)

**Terminal/CMD 3:**
```bash
npm run dev
```

### Cara Cepat: All-in-One Command

Jika menggunakan npm, Anda bisa jalankan semua sekaligus:

```bash
npm start
```

Ini akan otomatis menjalankan ketiga server.

---

## ✅ Verifikasi Server Berjalan

### Cek Reverb Server

Jalankan script checker:
```bash
php check-reverb.php
```

Output yang benar:
```
✅ SUCCESS: Reverb server is running!
   Server: ws://localhost:8080
   Status: CONNECTED
```

### Cek di Browser

1. Buka http://127.0.0.1:8000
2. Tekan **F12** (Developer Tools)
3. Buka tab **Console**
4. Harus terlihat:
   ```
   Real-time synchronization initialized
   ```

5. Buka tab **Network**
6. Filter **WS** (WebSocket)
7. Harus ada koneksi ke `ws://localhost:8080`
8. Status: **101 Switching Protocols** (hijau)

---

## 🧪 Test Real-time Berfungsi

### Test 1: Update Perusahaan

1. **Buka 2 browser** atau 2 tab:
   - Tab A: Login sebagai Admin → http://127.0.0.1:8000/login
   - Tab B: Buka halaman publik → http://127.0.0.1:8000/perusahaan

2. **Di Tab A (Admin):**
   - Masuk menu Perusahaan
   - Edit salah satu perusahaan
   - Ubah nama atau lokasi
   - Klik Simpan

3. **Lihat di Tab B:**
   - Data otomatis berubah tanpa refresh ✨
   - Toast notification muncul
   - Card ter-highlight sebentar

### Test 2: Verifikasi Status

1. **Buka 2 browser/device berbeda:**
   - Device A: Login sebagai Admin
   - Device B: Login sebagai User (yang punya pengajuan)

2. **Di Device A:**
   - Masuk menu Verifikasi
   - Approve atau Reject pengajuan mahasiswa

3. **Lihat di Device B:**
   - Status otomatis berubah
   - Badge warna berubah (hijau/merah/kuning)
   - Notification muncul

---

## 🐛 Troubleshooting

### Error 1: "Pusher error: 404 Not found"

**Penyebab:** Reverb server belum jalan

**Solusi:**
```bash
# Terminal baru
php artisan reverb:start
```

Atau double-click `START-REVERB.bat`

---

### Error 2: "Cannot connect to ws://localhost:8080"

**Penyebab:** Port 8080 sudah dipakai aplikasi lain

**Solusi 1: Cari aplikasi yang menggunakan port 8080**
```bash
netstat -ano | findstr :8080
```

**Solusi 2: Ganti port Reverb**

Edit file `.env`:
```
REVERB_PORT=8081
VITE_REVERB_PORT=8081
```

Lalu restart Reverb:
```bash
php artisan reverb:start --port=8081
```

---

### Error 3: Real-time tidak bekerja

**Diagnosis:**

1. **Cek apakah Reverb running:**
   ```bash
   php check-reverb.php
   ```

2. **Cek console browser (F12):**
   - Apakah ada pesan error?
   - Apakah terlihat "Real-time synchronization initialized"?

3. **Cek Network tab:**
   - Filter: WS (WebSocket)
   - Apakah ada koneksi ke localhost:8080?
   - Status: 101 Switching Protocols?

4. **Clear cache:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan view:clear
   ```

5. **Rebuild assets:**
   ```bash
   npm run build
   ```

---

### Error 4: "npm start" tidak berfungsi

**Solusi:** Jalankan manual per server

**Terminal 1:**
```bash
php artisan serve
```

**Terminal 2:**
```bash
php artisan reverb:start
```

**Terminal 3 (opsional):**
```bash
npm run dev
```

---

## 📊 Status Server

| Server | Port | Status Check |
|--------|------|--------------|
| Laravel | 8000 | http://127.0.0.1:8000 |
| Reverb | 8080 | `php check-reverb.php` |
| Vite | 5173 | http://localhost:5173 |

---

## 🎯 FAQ

### Q: Apakah aplikasi error jika Reverb tidak jalan?

**A: TIDAK!** Aplikasi tetap berfungsi 100% normal. Hanya fitur real-time yang tidak aktif. Semua CRUD tetap bekerja, user harus refresh manual saja.

### Q: Apakah wajib menjalankan Reverb?

**A: Tidak wajib** untuk development. Tapi sangat disarankan untuk melihat fitur real-time bekerja.

### Q: Bagaimana untuk production/deployment?

**A:** Untuk production:
1. Jalankan Reverb sebagai background service
2. Gunakan process manager seperti Supervisor (Linux) atau PM2
3. Ubah ke wss:// (Secure WebSocket)
4. Setup proper domain dan SSL certificate

Contoh config Supervisor:
```ini
[program:reverb]
command=php /path/to/artisan reverb:start
directory=/path/to/project
user=www-data
autostart=true
autorestart=true
```

### Q: Berapa banyak terminal yang harus dibuka?

**A:** Tergantung kebutuhan:
- **Minimal 1** terminal: Laravel server saja (tanpa real-time)
- **Optimal 2** terminal: Laravel + Reverb (dengan real-time)
- **Full 3** terminal: Laravel + Reverb + Vite (dengan hot reload)

### Q: Bagaimana cara stop semua server?

**A:** Tekan `Ctrl + C` di setiap terminal yang menjalankan server.

---

## 🎓 Kesimpulan

1. **Untuk testing cepat:** Cukup `php artisan serve`
2. **Untuk demo real-time:** Jalankan Laravel + Reverb
3. **Untuk development penuh:** Jalankan `npm start`

**Selamat coding! 🚀**

---

*Need help? Cek REALTIME-GUIDE.md untuk dokumentasi lengkap.*
