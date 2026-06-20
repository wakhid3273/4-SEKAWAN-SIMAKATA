╔═══════════════════════════════════════════════════════════════════╗
║                                                                   ║
║         🚨 REAL-TIME TIDAK BERFUNGSI? BACA INI! 🚨                ║
║                                                                   ║
╚═══════════════════════════════════════════════════════════════════╝

📌 FAKTA PENTING:

   ❌ Real-time TIDAK otomatis aktif
   ❌ HARUS jalankan Reverb server manual
   ❌ Untuk multi-device HARUS setup network mode

═══════════════════════════════════════════════════════════════════

🎯 IP ADDRESS ANDA: 192.168.1.23

   Teman harus akses: http://192.168.1.23:8000
   BUKAN: http://localhost:8000 ❌

═══════════════════════════════════════════════════════════════════

✅ LANGKAH MUDAH (Copy-Paste):

┌───────────────────────────────────────────────────────────────┐
│ STEP 1: Edit file .env                                        │
└───────────────────────────────────────────────────────────────┘

   Ganti:
   REVERB_HOST=localhost              → REVERB_HOST=192.168.1.23
   VITE_REVERB_HOST=localhost         → VITE_REVERB_HOST=192.168.1.23
   APP_URL=http://localhost           → APP_URL=http://192.168.1.23:8000

   SAVE!

┌───────────────────────────────────────────────────────────────┐
│ STEP 2: Rebuild (Terminal)                                    │
└───────────────────────────────────────────────────────────────┘

   npm run build
   php artisan config:clear
   php artisan cache:clear

┌───────────────────────────────────────────────────────────────┐
│ STEP 3: Start Laravel (Terminal 1)                            │
└───────────────────────────────────────────────────────────────┘

   php artisan serve --host=0.0.0.0 --port=8000

   PENTING: Harus ada --host=0.0.0.0

┌───────────────────────────────────────────────────────────────┐
│ STEP 4: Start Reverb (Terminal 2 BARU)                        │
└───────────────────────────────────────────────────────────────┘

   php artisan reverb:start --host=0.0.0.0 --port=8080

   PENTING: Harus ada --host=0.0.0.0

┌───────────────────────────────────────────────────────────────┐
│ STEP 5: Buka Firewall (Command Prompt as Admin)               │
└───────────────────────────────────────────────────────────────┘

   netsh advfirewall firewall add rule name="Laravel" dir=in action=allow protocol=TCP localport=8000

   netsh advfirewall firewall add rule name="Reverb" dir=in action=allow protocol=TCP localport=8080

═══════════════════════════════════════════════════════════════════

✅ CARA PALING MUDAH:

   Double-click: start-network-mode.bat

   (Tapi tetap harus edit .env, rebuild, dan buka firewall!)

═══════════════════════════════════════════════════════════════════

🧪 CEK BERHASIL:

   Browser Anda & Teman:
   ────────────────────
   1. Buka http://192.168.1.23:8000
   2. Tekan F12
   3. Lihat Console → "✅ WebSocket connected"
   4. Lihat pojok kanan bawah → 🟢 "Real-time Active"

   Jika SEMUA ✅ → Test update data!

═══════════════════════════════════════════════════════════════════

🐛 MASIH GAGAL?

   Jalankan:
   php debug-realtime.php

   Tool akan diagnosa masalahnya!

═══════════════════════════════════════════════════════════════════

📚 BACA PANDUAN LENGKAP:

   ► LANGKAH-PASTI-BERHASIL.md  (⭐ RECOMMENDED)
   ► WAJIB-BACA-REAL-TIME.md
   ► REAL-TIME-CHECKLIST.txt

═══════════════════════════════════════════════════════════════════
