<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use App\Models\MahasiswaMagang;
use App\Models\FinalProject;
use Carbon\Carbon;

// Ambil user pertama dengan role user
$user = User::where('role', 'user')->first();

if (!$user) {
    echo "User tidak ditemukan!\n";
    exit;
}

echo "User: {$user->nama_lengkap} (ID: {$user->id})\n\n";

// Ambil riwayat KP/Magang
$magangList = MahasiswaMagang::where('user_id', $user->id)
    ->with('perusahaan')
    ->orderBy('created_at', 'desc')
    ->get();

echo "=== Riwayat KP/Magang ===\n";
foreach ($magangList as $magang) {
    $perusahaanNama = $magang->perusahaan ? $magang->perusahaan->nama : 'Perusahaan';
    echo "- {$magang->kegiatan} di {$perusahaanNama}\n";
    echo "  Status: {$magang->status}\n";
    echo "  Posisi: {$magang->posisi}\n";
    echo "  Waktu: {$magang->created_at}\n\n";
}

// Ambil riwayat Tugas Akhir
$taList = FinalProject::where('user_id', $user->id)
    ->orderBy('created_at', 'desc')
    ->get();

echo "=== Riwayat Tugas Akhir ===\n";
foreach ($taList as $ta) {
    echo "- {$ta->title}\n";
    echo "  Status: {$ta->status}\n";
    echo "  Waktu: {$ta->created_at}\n\n";
}
