# 📋 Sistem Riwayat Aktivitas SIMAKATA

## 🎯 Overview

Sistem riwayat aktivitas yang berbeda untuk setiap role:

### 1. **Tamu (Belum Login)**
- ❌ Tidak ada fitur riwayat
- Hanya bisa melihat halaman public (landing, daftar perusahaan, dll)

### 2. **User (Mahasiswa)**
- ✅ Riwayat pengajuan KP/Magang milik user tersebut
- ✅ Riwayat Judul Tugas Akhir yang diajukan
- ✅ Status setiap pengajuan (Pending/Disetujui/Ditolak)
- ✅ Timeline dengan grouping tanggal (Hari Ini, Kemarin, dsb)
- Route: `/user/riwayat-aktivitas`

### 3. **Admin**
- ✅ Riwayat tindakan yang dilakukan admin
- ✅ Log semua aktivitas: approve/reject, CRUD perusahaan, dll
- ✅ Detail lengkap setiap aktivitas (siapa, apa, kapan)
- ✅ Filter berdasarkan jenis aktivitas
- Route: `/admin/riwayat-aktivitas`

---

## 📁 Database Structure

### Tabel: `admin_activity_logs`

```sql
- id (bigint, primary key)
- admin_id (foreign key -> users.id)
- action (string) 
  * approve_ta, reject_ta
  * approve_kp, reject_kp
  * create_perusahaan, update_perusahaan, delete_perusahaan
- subject_type (string) - FinalProject, MahasiswaMagang, Perusahaan
- subject_id (bigint) - ID dari subject
- description (string) - Deskripsi lengkap aktivitas
- details (json) - Detail tambahan (optional)
- created_at, updated_at
```

---

## 🔄 Cara Kerja

### A. User (Mahasiswa)

**Data yang ditampilkan:**
1. Pengajuan KP/Magang dari tabel `mahasiswa_magang` (filter: `user_id = current_user`)
2. Pengajuan Judul TA dari tabel `final_projects` (filter: `user_id = current_user`)

**Controller:** `App\Http\Controllers\User\RiwayatAktivitasController`

**View:** `resources/views/user/riwayat-aktivitas/index.blade.php`

**Fitur:**
- Timeline dengan icon berbeda per jenis aktivitas
- Badge status (Pending Review, Disetujui, Ditolak)
- Grouping berdasarkan tanggal (Hari Ini, Kemarin, dst)
- Filter by jenis kegiatan (Semua/KP-Magang/Tugas Akhir)
- Statistik card (Total, Pending, Disetujui)

---

### B. Admin

**Data yang ditampilkan:**
Log aktivitas dari tabel `admin_activity_logs`

**Aktivitas yang dicatat:**

1. **Verifikasi:**
   - Approve KP/Magang
   - Reject KP/Magang  
   - Approve Tugas Akhir
   - Reject Tugas Akhir

2. **Kelola Perusahaan:**
   - Tambah perusahaan baru
   - Update data perusahaan
   - Hapus perusahaan

**Controller:** `App\Http\Controllers\Admin\RiwayatAktivitasController`

**View:** `resources/views/admin/riwayat-aktivitas/index.blade.php`

**Fitur:**
- Timeline format dengan grouping tanggal
- Icon dan badge berbeda per jenis aktivitas
- Info admin yang melakukan aktivitas
- Filter by jenis aktivitas (Semua/Verifikasi/Perusahaan)
- Statistik card (Total, Verifikasi, Perusahaan)
- Pagination

---

## 💻 Implementasi

### 1. Mencatat Aktivitas Admin

Gunakan helper method di model `AdminActivityLog`:

```php
use App\Models\AdminActivityLog;

// Contoh: Log saat approve KP
AdminActivityLog::log(
    'approve_kp',
    "Menyetujui pengajuan Magang atas nama {$mahasiswa->nama}",
    'MahasiswaMagang',
    $mahasiswa->id,
    [
        'mahasiswa_nama' => $mahasiswa->nama,
        'mahasiswa_nim' => $mahasiswa->nim,
    ]
);
```

### 2. Controller yang Sudah Diupdate

✅ `Admin\VerifikasiController` - approve/reject KP & TA
✅ `PerusahaanController` - CRUD perusahaan

### 3. Routes

```php
// User
Route::get('/user/riwayat-aktivitas', [RiwayatAktivitasController::class, 'index'])
    ->middleware('role:user')
    ->name('user.riwayat-aktivitas');

// Admin
Route::get('/admin/riwayat-aktivitas', [Admin\RiwayatAktivitasController::class, 'index'])
    ->middleware('role:admin')
    ->name('admin.riwayat-aktivitas');
```

---

## 🎨 Tampilan

### User Dashboard
- Card "Riwayat Aktivitas" menampilkan 3-5 aktivitas terbaru
- Link "Lihat Semua" menuju halaman riwayat lengkap
- Timeline format dengan badge status berwarna

### Admin Dashboard
- Section "Riwayat Aktivitas Admin" di dashboard
- Link ke halaman riwayat lengkap
- Timeline dengan detail lengkap setiap tindakan

---

## 🧪 Testing

### Data Seeder Tersedia:

1. **RiwayatAktivitasSeeder** - Data dummy untuk user
2. **AdminActivityLogSeeder** - Data dummy untuk admin

```bash
php artisan db:seed --class=RiwayatAktivitasSeeder
php artisan db:seed --class=AdminActivityLogSeeder
```

### Test Login:

**User:**
- Email: user yang sudah terdaftar
- Dashboard: `/user/dashboard`
- Riwayat: `/user/riwayat-aktivitas`

**Admin:**
- Email: admin yang sudah terdaftar
- Dashboard: `/admin/dashboard`
- Riwayat: `/admin/riwayat-aktivitas`

---

## 📝 Catatan Penting

1. **Tamu tidak punya riwayat** - Route riwayat memerlukan login
2. **Setiap user hanya lihat riwayatnya sendiri** - Filter by `user_id`
3. **Admin melihat log semua admin** - Tidak difilter per admin
4. **Log otomatis tercatat** - Saat admin melakukan approve/reject/CRUD
5. **Real-time dari database** - Bukan data dummy/static

---

## 🔮 Pengembangan Selanjutnya

Jika ingin menambah aktivitas baru, cukup:

1. Tambahkan log di controller terkait:
```php
AdminActivityLog::log(
    'nama_action',
    'Deskripsi aktivitas',
    'ModelName',
    $id,
    $details
);
```

2. Update filter di `Admin\RiwayatAktivitasController` jika perlu
3. Update badge styling di view jika perlu

---

## ✅ Checklist Selesai

- [x] Migration tabel `admin_activity_logs`
- [x] Model `AdminActivityLog` dengan helper
- [x] Update controller admin untuk log aktivitas
- [x] Controller riwayat untuk user & admin
- [x] View halaman riwayat user
- [x] View halaman riwayat admin
- [x] Update dashboard user (tampilan riwayat)
- [x] Update dashboard admin (link riwayat)
- [x] Routes untuk user & admin
- [x] Data seeder untuk testing
- [x] Dokumentasi lengkap

---

## 🎯 Status: SELESAI! ✅

Sistem riwayat aktivitas sudah sepenuhnya berfungsi untuk ketiga role (Tamu, User, Admin) dengan fitur yang sesuai kebutuhan masing-masing.
