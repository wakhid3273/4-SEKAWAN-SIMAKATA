# 🚀 SIMAKATA Real-time Synchronization Guide

## 📋 Daftar Isi
- [Overview](#overview)
- [Arsitektur](#arsitektur)
- [Setup & Instalasi](#setup--instalasi)
- [Cara Kerja](#cara-kerja)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Testing](#testing)
- [Troubleshooting](#troubleshooting)
- [Pengembangan Lebih Lanjut](#pengembangan-lebih-lanjut)

---

## Overview

SIMAKATA sekarang memiliki fitur **real-time synchronization** yang memungkinkan semua pengguna (Admin, User, dan Tamu) melihat perubahan data secara otomatis tanpa perlu refresh halaman.

### ✨ Fitur Real-time:
- ✅ **Perusahaan**: Tambah, update, hapus
- ✅ **Mahasiswa Magang**: Status verifikasi (Disetujui/Ditolak)
- ✅ **Auto Notification**: Toast notification untuk setiap perubahan
- ✅ **Live UI Update**: Data ter-update langsung di halaman
- ✅ **Multi-device Sync**: Perubahan tersinkron ke semua device yang terhubung

---

## Arsitektur

```
┌─────────────────────────────────────────────────────────┐
│                    Client Browsers                       │
│  (Admin Dashboard, User Dashboard, Guest Landing Page)  │
└─────────────────┬───────────────────────────────────────┘
                  │ WebSocket Connection
                  │ (ws://localhost:8080)
                  ▼
┌─────────────────────────────────────────────────────────┐
│              Laravel Reverb Server                       │
│         (Real-time WebSocket Server)                     │
│              Port: 8080                                  │
└─────────────────┬───────────────────────────────────────┘
                  │ Broadcasting
                  │
┌─────────────────▼───────────────────────────────────────┐
│              Laravel Application                         │
│         (php artisan serve - Port 8000)                  │
│                                                          │
│  ┌──────────────────────────────────────────────────┐   │
│  │  Events:                                         │   │
│  │  - PerusahaanCreated                            │   │
│  │  - PerusahaanUpdated                            │   │
│  │  - PerusahaanDeleted                            │   │
│  │  - MahasiswaMagangCreated                       │   │
│  │  - MahasiswaMagangUpdated                       │   │
│  │  - MahasiswaMagangDeleted                       │   │
│  └──────────────────────────────────────────────────┘   │
│                                                          │
│  ┌──────────────────────────────────────────────────┐   │
│  │  Channels:                                       │   │
│  │  - perusahaan                                    │   │
│  │  - mahasiswa-magang                              │   │
│  └──────────────────────────────────────────────────┘   │
└──────────────────────────────────────────────────────────┘
```

### Stack Teknologi:
- **Backend**: Laravel 13 + Laravel Reverb
- **Frontend**: Vanilla JS + Laravel Echo + Pusher JS
- **WebSocket**: Laravel Reverb (Port 8080)
- **Protocol**: WebSocket (ws://)

---

## Setup & Instalasi

### 1. Dependencies Sudah Terinstall ✅

```bash
# Composer dependencies
composer require laravel/reverb

# NPM dependencies
npm install laravel-echo pusher-js
```

### 2. Konfigurasi Environment

File `.env` sudah dikonfigurasi:

```env
BROADCAST_CONNECTION=reverb

REVERB_APP_ID=12345
REVERB_APP_KEY=simakata_key
REVERB_APP_SECRET=simakata_secret
REVERB_HOST=localhost
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="${REVERB_HOST}"
VITE_REVERB_PORT="${REVERB_PORT}"
VITE_REVERB_SCHEME="${REVERB_SCHEME}"
```

### 3. File Struktur

```
app/
├── Events/
│   ├── PerusahaanCreated.php       ✅ Event saat perusahaan dibuat
│   ├── PerusahaanUpdated.php       ✅ Event saat perusahaan diupdate
│   ├── PerusahaanDeleted.php       ✅ Event saat perusahaan dihapus
│   ├── MahasiswaMagangCreated.php  ✅ Event saat pengajuan dibuat
│   ├── MahasiswaMagangUpdated.php  ✅ Event saat status verifikasi diubah
│   └── MahasiswaMagangDeleted.php  ✅ Event saat pengajuan dihapus

resources/
├── js/
│   ├── app.js          ✅ Entry point
│   ├── echo.js         ✅ Konfigurasi Laravel Echo
│   └── realtime.js     ✅ Real-time handlers & logic
```

---

## Cara Kerja

### 1. Backend Flow (Event Broadcasting)

Ketika admin melakukan perubahan data:

```php
// Contoh di PerusahaanController.php
public function update(Request $request, $id)
{
    $perusahaan = Perusahaan::findOrFail($id);
    $perusahaan->update($request->all());
    
    // Broadcast event ke semua client yang terhubung
    broadcast(new PerusahaanUpdated($perusahaan));
    
    return redirect()->back();
}
```

### 2. Event Structure

```php
// app/Events/PerusahaanUpdated.php
class PerusahaanUpdated implements ShouldBroadcastNow
{
    public function broadcastOn(): array
    {
        return [new Channel('perusahaan')]; // Public channel
    }

    public function broadcastAs(): string
    {
        return 'perusahaan.updated'; // Event name
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->perusahaan->id,
            'nama' => $this->perusahaan->nama,
            'lokasi' => $this->perusahaan->lokasi,
            // ... data lainnya
        ];
    }
}
```

### 3. Frontend Flow (Listening)

```javascript
// resources/js/realtime.js
window.Echo.channel('perusahaan')
    .listen('.perusahaan.updated', (data) => {
        // Update UI tanpa refresh
        updatePerusahaanCard(data);
        showNotification('Data diperbarui');
    });
```

### 4. Channels Yang Tersedia

| Channel | Event | Deskripsi |
|---------|-------|-----------|
| `perusahaan` | `perusahaan.created` | Perusahaan baru ditambahkan |
| `perusahaan` | `perusahaan.updated` | Data perusahaan diupdate |
| `perusahaan` | `perusahaan.deleted` | Perusahaan dihapus |
| `mahasiswa-magang` | `mahasiswa.created` | Pengajuan baru |
| `mahasiswa-magang` | `mahasiswa.updated` | Status verifikasi berubah |
| `mahasiswa-magang` | `mahasiswa.deleted` | Pengajuan dihapus |

---

## Menjalankan Aplikasi

### Opsi 1: Menggunakan npm start (Recommended)

Jalankan **3 server sekaligus** dalam 1 command:

```bash
npm start
```

Ini akan menjalankan:
- Laravel Server (Port 8000)
- Vite Dev Server (Hot reload)
- Laravel Reverb Server (Port 8080)

### Opsi 2: Manual (3 Terminal)

**Terminal 1 - Laravel Server:**
```bash
php artisan serve
```

**Terminal 2 - Vite Dev Server:**
```bash
npm run dev
```

**Terminal 3 - Reverb Server:**
```bash
php artisan reverb:start
```

### Verifikasi Server Running

Setelah menjalankan, pastikan:
- ✅ Laravel: http://127.0.0.1:8000
- ✅ Vite: http://localhost:5173
- ✅ Reverb: ws://localhost:8080

Console browser akan menampilkan:
```
Real-time synchronization initialized
```

---

## Testing

### 1. Test Real-time Perusahaan

1. **Buka 2 browser/tab:**
   - Browser A: Login sebagai Admin
   - Browser B: Buka halaman publik `/perusahaan`

2. **Di Browser A (Admin):**
   - Masuk ke `/admin/perusahaan`
   - Edit/tambah/hapus perusahaan

3. **Lihat di Browser B:**
   - Halaman akan otomatis ter-update
   - Toast notification muncul
   - Data berubah tanpa refresh

### 2. Test Real-time Verifikasi

1. **Buka 2 browser/tab:**
   - Browser A: Login sebagai Admin
   - Browser B: Login sebagai User (pemilik pengajuan)

2. **Di Browser A (Admin):**
   - Masuk ke `/admin/verifikasi`
   - Approve/Reject pengajuan

3. **Lihat di Browser B (User):**
   - Halaman riwayat ter-update otomatis
   - Status badge berubah warna
   - Toast notification muncul

### 3. Console Debugging

Buka Console (F12) untuk melihat real-time events:

```javascript
// Di console browser akan terlihat:
Perusahaan Updated: {id: 44, nama: "PT Maju Jaya", lokasi: "Jakarta", ...}
🔄 Data perusahaan diperbarui: PT Maju Jaya
```

---

## Troubleshooting

### ❌ Error: "Pusher error: 404 Not found"

**Penyebab:** Reverb server tidak berjalan

**Solusi:**
```bash
php artisan reverb:start
```

### ❌ Error: "Cannot connect to ws://localhost:8080"

**Penyebab:** Port 8080 sudah digunakan atau firewall memblokir

**Solusi:**
```bash
# Cek port yang digunakan
netstat -ano | findstr :8080

# Ganti port di .env
REVERB_PORT=8081
VITE_REVERB_PORT=8081

# Restart Reverb
php artisan reverb:start --port=8081
```

### ❌ UI Tidak Update Otomatis

**Diagnosis:**

1. **Cek Console Browser (F12):**
   ```
   Apakah ada error? 
   Apakah terlihat "Real-time synchronization initialized"?
   ```

2. **Cek Network Tab:**
   ```
   Apakah ada koneksi WebSocket (ws://localhost:8080)?
   Status: 101 Switching Protocols (sukses)
   ```

3. **Test Manual Event:**
   ```javascript
   // Di console browser
   window.Echo.channel('perusahaan')
       .listen('.perusahaan.updated', (e) => console.log(e));
   ```

4. **Trigger Event Manual:**
   ```bash
   # Di terminal
   php artisan tinker
   >>> broadcast(new \App\Events\PerusahaanUpdated(\App\Models\Perusahaan::first()));
   ```

### ❌ Assets Tidak Ter-load

**Solusi:**
```bash
# Rebuild assets
npm run build

# Clear cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

---

## Pengembangan Lebih Lanjut

### 1. Menambah Real-time untuk Model Baru

**Step 1: Buat Event**
```bash
php artisan make:event UserProfileUpdated
```

**Step 2: Implement Event**
```php
<?php
namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class UserProfileUpdated implements ShouldBroadcastNow
{
    public function __construct(public User $user) {}

    public function broadcastOn(): array
    {
        return [new Channel('users')];
    }

    public function broadcastAs(): string
    {
        return 'user.updated';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->user->id,
            'nama_lengkap' => $this->user->nama_lengkap,
            'email' => $this->user->email,
        ];
    }
}
```

**Step 3: Trigger di Controller**
```php
use App\Events\UserProfileUpdated;

public function update(Request $request, User $user)
{
    $user->update($request->all());
    broadcast(new UserProfileUpdated($user));
    return redirect()->back();
}
```

**Step 4: Listen di Frontend**
```javascript
// resources/js/realtime.js
window.Echo.channel('users')
    .listen('.user.updated', (data) => {
        console.log('User updated:', data);
        updateUserUI(data);
    });
```

### 2. Private Channels (Untuk Data Pribadi)

Gunakan **Private Channel** jika data hanya untuk user tertentu:

```php
// Event
public function broadcastOn(): array
{
    return [new PrivateChannel('user.' . $this->user->id)];
}
```

```javascript
// Frontend (authenticated user)
window.Echo.private(`user.${userId}`)
    .listen('.profile.updated', (e) => {
        console.log('Your profile updated', e);
    });
```

### 3. Presence Channels (Online Users)

Untuk menampilkan user yang sedang online:

```php
// Event
public function broadcastOn(): array
{
    return [new PresenceChannel('admin-dashboard')];
}
```

```javascript
// Frontend
window.Echo.join('admin-dashboard')
    .here((users) => {
        console.log('Currently online:', users);
    })
    .joining((user) => {
        console.log('User joined:', user.name);
    })
    .leaving((user) => {
        console.log('User left:', user.name);
    });
```

---

## 📊 Performance Tips

### 1. Rate Limiting

Tambahkan throttle untuk mencegah spam events:

```php
// app/Providers/BroadcastServiceProvider.php
Broadcast::channel('perusahaan', function ($user) {
    return true; // Public channel
}, ['throttle:60,1']); // Max 60 requests per minute
```

### 2. Queue Events

Untuk aplikasi dengan traffic tinggi, gunakan queue:

```php
// Ganti ShouldBroadcastNow dengan ShouldBroadcast
class PerusahaanUpdated implements ShouldBroadcast
{
    // Event akan di-queue
}
```

Jalankan queue worker:
```bash
php artisan queue:work
```

### 3. Selective Broadcasting

Hanya broadcast data yang berubah:

```php
broadcast(new PerusahaanUpdated($perusahaan))->toOthers();
// toOthers() = tidak broadcast ke user yang melakukan perubahan
```

---

## 🔐 Security Best Practices

1. **Validasi di Backend**: Selalu validasi data sebelum broadcast
2. **Authorization**: Gunakan Private/Presence channel untuk data sensitif
3. **Sanitize Data**: Escape HTML di frontend untuk mencegah XSS
4. **Rate Limiting**: Implementasikan rate limiting
5. **HTTPS di Production**: Gunakan wss:// (WebSocket Secure) di production

---

## 📚 Resources

- [Laravel Broadcasting Docs](https://laravel.com/docs/13.x/broadcasting)
- [Laravel Reverb Docs](https://laravel.com/docs/13.x/reverb)
- [Laravel Echo Docs](https://laravel.com/docs/13.x/echo)
- [Pusher JS Docs](https://pusher.com/docs/channels/using_channels/client-api/)

---

## 🎯 Summary

✅ **Real-time sync untuk Perusahaan & Mahasiswa Magang sudah aktif**  
✅ **Multi-device sync berfungsi**  
✅ **Toast notification untuk feedback user**  
✅ **Scalable architecture dengan Laravel Reverb**  
✅ **Mudah dikembangkan untuk model lainnya**  

**Happy Coding! 🚀**

---

*Dibuat untuk SIMAKATA - Sistem Informasi Manajemen Data Kegiatan Mahasiswa*
