<?php

require __DIR__.'/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$file = __DIR__ . '/DATABASE MAGANG ATAU MBKM.xlsx';

echo "=== FULL LOCATION DISTRIBUTION ===\n\n";

try {
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    
    // Column E = Tempat Magang
    $locations = [];
    $highestRow = $sheet->getHighestRow();
    
    for ($row = 2; $row <= $highestRow; $row++) {
        $loc = $sheet->getCell('E' . $row)->getValue();
        if ($loc) {
            $loc = trim($loc);
            if (!isset($locations[$loc])) {
                $locations[$loc] = 0;
            }
            $locations[$loc]++;
        }
    }
    
    arsort($locations);
    
    echo "Total unique locations: " . count($locations) . "\n";
    echo "Total records: " . array_sum($locations) . "\n\n";
    
    echo "--- Top 20 Locations ---\n";
    $count = 0;
    foreach ($locations as $loc => $num) {
        $count++;
        echo sprintf("%2d. %-70s : %3d mahasiswa\n", $count, $loc, $num);
        if ($count >= 20) break;
    }
    
    echo "\n--- Data for Chart (Top 8) ---\n";
    echo "Use this data for sebaranMagang:\n\n";
    echo "[\n";
    $count = 0;
    foreach ($locations as $loc => $num) {
        $count++;
        if ($count <= 8) {
            echo "    '{$loc}' => {$num},\n";
        }
    }
    echo "]\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== DONE ===\n";
