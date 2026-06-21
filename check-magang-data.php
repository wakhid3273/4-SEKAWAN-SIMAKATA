<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\MahasiswaMagang;
use App\Models\Perusahaan;

echo "=== CHECKING MAGANG DATA ===\n\n";

// Total records
$total = MahasiswaMagang::count();
echo "Total MahasiswaMagang records: {$total}\n\n";

// Check kegiatan values
echo "--- Kegiatan Distribution ---\n";
$kegiatan = MahasiswaMagang::selectRaw('kegiatan, COUNT(*) as count')
    ->groupBy('kegiatan')
    ->get();

foreach ($kegiatan as $k) {
    echo "{$k->kegiatan}: {$k->count}\n";
}

echo "\n--- Magang Related Records ---\n";
$magangCount = MahasiswaMagang::where(function($q) {
    $q->where('kegiatan', 'like', '%Magang%')
      ->orWhere('kegiatan', 'MBKM')
      ->orWhere('kegiatan', 'MSIB');
})->count();
echo "Total Magang/MBKM/MSIB: {$magangCount}\n\n";

// Check sebaran query
echo "--- Testing Sebaran Magang Query ---\n";
$sebaranMagang = MahasiswaMagang::with('perusahaan')
    ->selectRaw('perusahaan_id, COUNT(*) as total')
    ->whereNotNull('perusahaan_id')
    ->where(function($q) {
        $q->where('kegiatan', 'like', '%Magang%')
          ->orWhere('kegiatan', 'MBKM')
          ->orWhere('kegiatan', 'MSIB');
    })
    ->groupBy('perusahaan_id')
    ->orderByDesc('total')
    ->limit(8)
    ->get();

echo "Query returned " . $sebaranMagang->count() . " results:\n";
foreach ($sebaranMagang as $item) {
    $nama = $item->perusahaan->nama ?? 'Unknown';
    echo "  - {$nama}: {$item->total}\n";
}

echo "\n--- Checking Perusahaan Data ---\n";
$totalPerusahaan = Perusahaan::count();
echo "Total Perusahaan: {$totalPerusahaan}\n";

if ($totalPerusahaan > 0) {
    $sample = Perusahaan::take(5)->get(['id', 'nama']);
    echo "Sample perusahaan:\n";
    foreach ($sample as $p) {
        echo "  - ID {$p->id}: {$p->nama}\n";
    }
}

echo "\n=== DONE ===\n";
