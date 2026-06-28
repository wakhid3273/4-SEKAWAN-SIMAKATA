# SIMAKATA - Sistem Informasi Manajemen Data Kegiatan Mahasiswa

## 📝 Deskripsi
SIMAKATA adalah sistem informasi untuk mengelola data kegiatan mahasiswa Informatika, termasuk Kerja Praktik (KP), Magang/MBKM, dan Tugas Akhir (TA).

## ✨ Fitur Utama

### 🔐 Multi-Role Access
- **Admin**: Kelola perusahaan, verifikasi pengajuan, kelola data mahasiswa
- **Mahasiswa**: Ajukan KP/Magang, lihat riwayat, kelola profil
- **Tamu**: Lihat database perusahaan dan informasi publik

### 🚀 Real-time Synchronization (NEW!)
- ✅ Data ter-update otomatis tanpa refresh halaman
- ✅ Multi-device & multi-user sync
- ✅ Toast notifications untuk setiap perubahan
- ✅ Live status updates untuk verifikasi pengajuan
- ✅ Sinkronisasi data perusahaan real-time

**[📖 Baca Panduan Real-time Lengkap](REALTIME-GUIDE.md)**

### 📊 Fitur Lainnya
- Dashboard interaktif dengan statistik
- Database perusahaan mitra
- Sistem verifikasi pengajuan
- Export PDF laporan
- Filter & pencarian data
- Profil mahasiswa & admin

## 🛠️ Tech Stack

### Backend
- **Framework**: Laravel 13
- **Database**: SQLite
- **Broadcasting**: Laravel Reverb (WebSocket)
- **PDF Generator**: DomPDF

### Frontend
- **CSS Framework**: Tailwind CSS 4
- **JavaScript**: Vanilla JS + Laravel Echo
- **Real-time**: Pusher JS + WebSocket
- **Build Tool**: Vite 8
- **Icons**: Material Icons

### Development
- **Package Manager**: Composer + NPM
- **PHP Version**: ^8.3
- **Node Version**: Latest LTS

## 📦 Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/wakhid3273/4-SEKAWAN-SIMAKATA.git
cd 4-SEKAWAN-SIMAKATA
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### 3. Setup Environment
```bash
# Copy .env.example ke .env
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Setup Database
```bash
# Jalankan migrations
php artisan migrate

# Seed database dengan data dummy (opsional)
php artisan db:seed
```

### 5. Build Assets
```bash
npm run build
```

## 🚀 Menjalankan Aplikasi

### Opsi 1: Real-time Mode (Recommended)

Jalankan **semua server sekaligus** dengan 1 command:

```bash
npm start
```

Atau double-click file `start-realtime.bat` di Windows.

Ini akan menjalankan:
- Laravel Server (Port 8000)
- Vite Dev Server (Hot reload)
- Laravel Reverb Server (Port 8080)

### Opsi 2: Development Tanpa Real-time

```bash
# Terminal 1: Laravel Server
php artisan serve

# Terminal 2: Vite Dev Server
npm run dev
```

### Opsi 3: Production Build

```bash
# Build assets untuk production
npm run build

# Jalankan server
php artisan serve
```

## 🌐 Akses Aplikasi

- **Website**: http://127.0.0.1:8000
- **Real-time WebSocket**: ws://localhost:8080

### Default Login

**Admin:**
- Email: wakhid@mhs.unsoed.ac.id
- Password: wakhid3

**User:**
Lakukan register terlebih dahulu kemudian login
- Email: wann@mhs.unsoed.ac.id
- Password: 123456

## 📚 Dokumentasi

- [Panduan Real-time Synchronization](REALTIME-GUIDE.md)
- [API Documentation](#) *(coming soon)*
- [Database Schema](#) *(coming soon)*

## 🔧 Development Commands

```bash
# Clear all cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Run migrations
php artisan migrate

# Seed database
php artisan db:seed

# Run specific seeder
php artisan db:seed --class=PerusahaanSeeder

# Build assets
npm run build

# Watch for changes
npm run dev

# Start Reverb server (Real-time)
php artisan reverb:start

# Run all servers at once
npm start
```

## 📁 Struktur Project

```
SIMAKATA/
├── app/
│   ├── Events/                 # Real-time events
│   ├── Http/
│   │   ├── Controllers/        # Controllers
│   │   └── Middleware/         # Middleware
│   └── Models/                 # Eloquent models
├── database/
│   ├── migrations/             # Database migrations
│   └── seeders/                # Database seeders
├── public/
│   └── build/                  # Compiled assets
├── resources/
│   ├── css/                    # Tailwind CSS
│   ├── js/                     # JavaScript
│   │   ├── app.js             # Main JS entry
│   │   ├── echo.js            # Echo config
│   │   └── realtime.js        # Real-time handlers
│   └── views/                  # Blade templates
├── routes/
│   └── web.php                # Web routes
├── .env                        # Environment config
├── composer.json               # PHP dependencies
├── package.json                # JavaScript dependencies
├── start-realtime.bat         # Quick start script
├── REALTIME-GUIDE.md          # Real-time documentation
└── README.md                   # This file
```

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter=PerusahaanTest
```

## 🐛 Troubleshooting

### Real-time Tidak Bekerja

1. Pastikan Reverb server berjalan:
   ```bash
   php artisan reverb:start
   ```

2. Cek console browser (F12) untuk error

3. Lihat [REALTIME-GUIDE.md](REALTIME-GUIDE.md#troubleshooting)

### Error Database

```bash
# Reset database
php artisan migrate:fresh --seed
```

### Assets Tidak Ter-load

```bash
# Rebuild assets
npm run build

# Clear cache
php artisan view:clear
```

## 🤝 Contributing

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

This project is licensed under the MIT License.

## 👥 Team

**4 SEKAWAN**
- Developer 1 : Wakhid Nugroho
- Developer 2 : Astria Dina Fitri
- Developer 3 : Novia Rizky
- Developer 4 : Naila Alifatul

## 📞 Contact

- **Repository**: https://github.com/wakhid3273/4-SEKAWAN-SIMAKATA
- **Issues**: https://github.com/wakhid3273/4-SEKAWAN-SIMAKATA/issues

---

**Built with ❤️ using Laravel 13 + Real-time WebSocket**
