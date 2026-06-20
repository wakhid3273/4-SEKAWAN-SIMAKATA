<?php
// Script sementara untuk setup database SQLite
// Hapus file ini setelah dijalankan

$dbPath = __DIR__ . '/../database/database.sqlite';

if (!file_exists($dbPath)) {
    if (file_put_contents($dbPath, '') !== false) {
        echo "✅ File SQLite berhasil dibuat: $dbPath\n";
    } else {
        echo "❌ Gagal membuat file SQLite\n";
    }
} else {
    echo "ℹ️ File SQLite sudah ada: $dbPath\n";
}
echo "Sekarang jalankan: php artisan migrate\n";
