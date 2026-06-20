# ⚠️ WAJIB BACA: Cara Aktifkan Real-time

## 🚨 PENTING: Real-time TIDAK AKAN BERFUNGSI jika Reverb server tidak jalan!

Real-time **bukan otomatis aktif**. Anda harus **menjalankan Reverb server** secara manual.

---

## 📝 Checklist untuk Real-time Berfungsi

### ✅ Yang HARUS Dilakukan:

#### 1. **Jalankan Laravel Server** (Terminal 1)
```bash
php artisan serve
```

#### 2. **Jalankan Reverb Server** (Terminal 2) ⚠️ **INI YANG SERING TERLUPA!**
```bash
php artisan reverb:start
```

**ATAU** double-click file `START-REVERB.bat`

#### 3. **Kedua Device Harus Terhubung ke Server yang Sama**

**Komputer Anda (yang menjalankan server):**
- Akses: `http://127.0.0.1:8000`
- Reverb: `ws://localhost:8080`

**Teman Anda (device lain di jaringan yang sama):**
- Akses: `http://192.168.X.X:8000` (IP komputer Anda)
- Reverb: `ws://192.168.X.X:8080`

---

## 🔍 Cara Cek IP Komputer Anda

Jalankan di Command Prompt:

```bash
ipconfig
```

Cari baris:
```
IPv4 Address. . . . . . . . . . . : 192.168.1.100
```

IP ini yang digunakan teman untuk akses.

---

## 🌐 Setup untuk Multi-Device (Network Access)

### Step 1: Jalankan Laravel dengan Host 0.0.0.0

**Ganti dari:**
```bash
php artisan serve
```

**Menjadi:**
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Ini membuat server bisa diakses dari komputer lain.

### Step 2: Update File .env

Edit file `.env`:

```env
# Ganti dari localhost ke IP komputer Anda
REVERB_HOST=192.168.1.100  # ⬅️ Ganti dengan IP Anda!
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_HOST=192.168.1.100  # ⬅️ Ganti dengan IP Anda!
VITE_REVERB_PORT=8080
VITE_REVERB_SCHEME=http

APP_URL=http://192.168.1.100:8000  # ⬅️ Ganti dengan IP Anda!
```

### Step 3: Rebuild Assets

```bash
npm run build
```

### Step 4: Clear Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Step 5: Jalankan Reverb dengan Host 0.0.0.0

```bash
php artisan reverb:start --host=0.0.0.0 --port=8080
```

### Step 6: Pastikan Firewall Terbuka

**Windows Firewall:**
- Buka `Windows Defender Firewall`
- Klik `Allow an app through firewall`
- Pastikan PHP allowed untuk Private networks

**Atau tambah rule manual:**
```bash
netsh advfirewall firewall add rule name="Laravel Server" dir=in action=allow protocol=TCP localport=8000
netsh advfirewall firewall add rule name="Reverb Server" dir=in action=allow protocol=TCP localport=8080
```

---

## 🧪 Test Real-time Berfungsi

### Di Komputer Anda:

1. Buka browser → http://127.0.0.1:8000
2. Tekan **F12** → Console
3. Harus terlihat:
   ```
   Real-time synchronization initialized
   ✅ WebSocket connected successfully
   ```
4. Lihat pojok kanan bawah → **"Real-time Active"** (hijau)

### Di Komputer Teman:

1. Buka browser → http://192.168.1.100:8000 (ganti dengan IP Anda)
2. Tekan **F12** → Console
3. Harus terlihat pesan yang sama
4. Lihat pojok kanan bawah → **"Real-time Active"** (hijau)

### Test Update:

1. **Di komputer Anda:** Login sebagai Admin → Edit perusahaan
2. **Di komputer teman:** Buka halaman `/perusahaan` → **Data harus otomatis update**

---

## 🐛 Troubleshooting

### ❌ Problem: "Real-time Offline" di indicator

**Penyebab:** Reverb server tidak jalan

**Solusi:**
```bash
php artisan reverb:start --host=0.0.0.0
```

---

### ❌ Problem: Teman tidak bisa akses website

**Penyebab:** Laravel server hanya listen di localhost

**Solusi:**
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

**Dan pastikan firewall terbuka!**

---

### ❌ Problem: Website bisa diakses tapi real-time tidak jalan

**Diagnosa:**

1. **Cek Console (F12):**
   - Apakah ada error WebSocket?
   - Apakah terlihat "WebSocket connected"?

2. **Cek Network Tab:**
   - Filter: **WS** (WebSocket)
   - Apakah ada koneksi ke `ws://192.168.X.X:8080`?
   - Status harus: **101 Switching Protocols** (hijau)

3. **Cek .env sudah benar:**
   ```env
   REVERB_HOST=192.168.1.100  # Harus IP publik, bukan localhost!
   ```

4. **Rebuild assets setelah ubah .env:**
   ```bash
   npm run build
   php artisan config:clear
   ```

---

### ❌ Problem: WebSocket connection failed

**Kemungkinan penyebab:**

1. **Port 8080 blocked oleh firewall**
   - Buka firewall untuk port 8080

2. **Reverb tidak jalan dengan --host=0.0.0.0**
   - Harus pakai flag `--host=0.0.0.0` untuk network access

3. **IP di .env masih localhost**
   - Harus ganti ke IP jaringan (192.168.X.X)

---

## 📊 Checklist Lengkap

Gunakan checklist ini untuk memastikan semuanya benar:

### Di Komputer Server (yang menjalankan Laravel):

- [ ] ✅ IP address sudah dicek (`ipconfig`)
- [ ] ✅ File `.env` sudah update dengan IP yang benar
- [ ] ✅ Assets sudah di-build (`npm run build`)
- [ ] ✅ Cache sudah di-clear (`php artisan config:clear`)
- [ ] ✅ Laravel server jalan dengan `--host=0.0.0.0`
- [ ] ✅ Reverb server jalan dengan `--host=0.0.0.0`
- [ ] ✅ Firewall port 8000 dan 8080 terbuka
- [ ] ✅ Console browser menunjukkan "WebSocket connected"
- [ ] ✅ Indicator menunjukkan "Real-time Active" (hijau)

### Di Komputer Client (teman):

- [ ] ✅ Akses menggunakan IP server (bukan localhost)
- [ ] ✅ Bisa buka website http://192.168.X.X:8000
- [ ] ✅ Console browser menunjukkan "WebSocket connected"
- [ ] ✅ Indicator menunjukkan "Real-time Active" (hijau)
- [ ] ✅ Test update data → harus otomatis update

---

## 🚀 Quick Start Commands (Copy-Paste)

### Terminal 1: Laravel Server
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

### Terminal 2: Reverb Server
```bash
php artisan reverb:start --host=0.0.0.0 --port=8080 --debug
```

### Terminal 3: Cek Status (optional)
```bash
php check-reverb.php
```

---

## 💡 Tips

1. **Gunakan WiFi yang sama** untuk semua device
2. **Matikan VPN** jika ada (bisa block koneksi)
3. **Gunakan browser modern** (Chrome, Firefox, Edge)
4. **Jangan gunakan mode Incognito** (bisa block WebSocket)
5. **Pastikan tidak ada antivirus** yang block port 8080

---

## 🎯 Example Setup yang Benar

### Komputer Server (192.168.1.100):

**Terminal 1:**
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

**Terminal 2:**
```bash
php artisan reverb:start --host=0.0.0.0 --port=8080
```

**File .env:**
```env
REVERB_HOST=192.168.1.100
REVERB_PORT=8080
VITE_REVERB_HOST=192.168.1.100
VITE_REVERB_PORT=8080
APP_URL=http://192.168.1.100:8000
```

### Komputer Client (Teman):

**Browser:** 
- Akses: `http://192.168.1.100:8000`

**Console harus menunjukkan:**
```
Real-time synchronization initialized
✅ WebSocket connected successfully
```

**Indicator di pojok kanan bawah:**
```
🟢 Real-time Active
```

---

## ❓ FAQ

### Q: Apakah harus rebuild assets setiap kali?

**A:** Hanya perlu rebuild jika:
- Pertama kali setup
- Setelah ubah file `.env`
- Setelah pull dari git
- Setelah ubah file JS

### Q: Apakah bisa tanpa Reverb server?

**A:** Bisa, tapi **TIDAK ADA real-time**. Aplikasi tetap berfungsi normal, hanya data tidak auto-update.

### Q: Kenapa di localhost berfungsi tapi di IP tidak?

**A:** Kemungkinan:
1. File `.env` masih pakai `localhost`
2. Server tidak jalan dengan `--host=0.0.0.0`
3. Assets belum di-rebuild setelah ubah `.env`

### Q: Apakah teman harus pull dari git juga?

**A:** TIDAK! Hanya komputer yang menjalankan server yang perlu pull. Teman cukup akses via browser ke IP server.

---

## 🆘 Masih Tidak Berfungsi?

Kirim screenshot dari:

1. **Console browser (F12)** - lihat error messages
2. **Network tab (F12)** - filter WS, lihat status WebSocket
3. **Terminal Reverb server** - lihat log connections
4. **File .env** - bagian REVERB dan APP_URL
5. **Hasil `ipconfig`** - untuk verifikasi IP

---

**Real-time akan 100% berfungsi jika semua checklist terpenuhi!** ✅
