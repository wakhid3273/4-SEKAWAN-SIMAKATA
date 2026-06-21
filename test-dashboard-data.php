<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\Perusahaan;
use App\Models\MahasiswaMagang;

echo "=== TESTING DASHBOARD DATA ===\n\n";

// Simulate controller logic
$totalPerusahaan    = Perusahaan::count();
$totalUserAktif     = User::where('role', 'user')->count();
$menungguVerifikasi = MahasiswaMagang::where('status', 'pending')->count();

echo "Stats:\n";
echo "  Total Perusahaan: {$totalPerusahaan}\n";
echo "  Total User Aktif: {$totalUserAktif}\n";
echo "  Menunggu Verifikasi: {$menungguVerifikasi}\n\n";

// Sebaran KP
$sebaranKP = MahasiswaMagang::with('perusahaan')
    ->selectRaw('perusahaan_id, COUNT(*) as total')
    ->whereNotNull('perusahaan_id')
    ->where('kegiatan', 'like', '%Kerja Praktik%')
    ->orWhere('kegiatan', 'KP')
    ->groupBy('perusahaan_id')
    ->orderByDesc('total')
    ->limit(8)
    ->get()
    ->mapWithKeys(function($item) {
        $nama = $item->perusahaan->nama ?? 'Lainnya';
        return [$nama => $item->total];
    })
    ->toArray();

echo "Sebaran KP:\n";
if (empty($sebaranKP)) {
    echo "  (empty)\n";
} else {
    foreach ($sebaranKP as $nama => $total) {
        echo "  - {$nama}: {$total}\n";
    }
}

// Sebaran Magang - with fallback
$sebaranMagangDB = MahasiswaMagang::with('perusahaan')
    ->selectRaw('perusahaan_id, COUNT(*) as total')
    ->whereNotNull('perusahaan_id')
    ->where(function($q) {
        $q->where('kegiatan', 'like', '%Magang%')
          ->orWhere('kegiatan', 'like', '%MBKM%')
          ->orWhere('kegiatan', 'like', '%MSIB%');
    })
    ->groupBy('perusahaan_id')
    ->orderByDesc('total')
    ->limit(8)
    ->get()
    ->mapWithKeys(function($item) {
        $nama = $item->perusahaan->nama ?? 'Lainnya';
        return [$nama => $item->total];
    })
    ->toArray();

echo "\nSebaran Magang (from DB):\n";
if (empty($sebaranMagangDB)) {
    echo "  (empty - will use Excel data)\n";
} else {
    foreach ($sebaranMagangDB as $nama => $total) {
        echo "  - {$nama}: {$total}\n";
    }
}

// Use fallback if needed
if (count($sebaranMagangDB) < 3) {
    $sebaranMagang = [
        'PT Bank Central Asia Tbk' => 2,
        'Bangkit Academy' => 2,
        'PT Pegadaian' => 2,
        'CNN Indonesia' => 2,
        'PT Mitra Integrasi Informatika' => 2,
        'Kementerian Keuangan' => 1,
        'Solo Technopark' => 1,
        'PT Permodalan Nasional Madani' => 1,
    ];
    echo "\nUsing Excel Data (Fallback):\n";
} else {
    $sebaranMagang = $sebaranMagangDB;
    echo "\nUsing Database Data:\n";
}

foreach ($sebaranMagang as $nama => $total) {
    echo "  - {$nama}: {$total}\n";
}

echo "\n✅ Data ready for chart display!\n";
echo "\n=== DONE ===\n";
