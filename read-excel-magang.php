<?php

require __DIR__.'/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$file = __DIR__ . '/DATABASE MAGANG ATAU MBKM.xlsx';

if (!file_exists($file)) {
    die("File not found: {$file}\n");
}

echo "=== READING EXCEL FILE ===\n";
echo "File: DATABASE MAGANG ATAU MBKM.xlsx\n\n";

try {
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    
    echo "--- Sheet Info ---\n";
    echo "Title: " . $sheet->getTitle() . "\n";
    echo "Highest Row: " . $sheet->getHighestRow() . "\n";
    echo "Highest Column: " . $sheet->getHighestColumn() . "\n\n";
    
    // Read headers
    echo "--- Headers (Row 1) ---\n";
    $headers = [];
    $highestColumn = $sheet->getHighestColumn();
    $columnIndex = 'A';
    while ($columnIndex <= $highestColumn) {
        $value = $sheet->getCell($columnIndex . '1')->getValue();
        if ($value) {
            $headers[$columnIndex] = $value;
            echo "{$columnIndex}: {$value}\n";
        }
        $columnIndex++;
    }
    
    echo "\n--- Sample Data (First 10 Rows) ---\n";
    $highestRow = min($sheet->getHighestRow(), 11); // Header + 10 rows
    
    for ($row = 2; $row <= $highestRow; $row++) {
        echo "\nRow {$row}:\n";
        foreach ($headers as $col => $header) {
            $value = $sheet->getCell($col . $row)->getValue();
            if ($value) {
                echo "  {$header}: {$value}\n";
            }
        }
    }
    
    // Count total data rows
    $totalRows = $sheet->getHighestRow() - 1; // Exclude header
    echo "\n\n--- Summary ---\n";
    echo "Total data rows: {$totalRows}\n";
    
    // Try to find location/company column
    echo "\n--- Analyzing Location/Company Data ---\n";
    $locationColumns = ['Lokasi', 'Perusahaan', 'Instansi', 'Tempat', 'Company', 'Location'];
    $foundColumn = null;
    
    foreach ($locationColumns as $possibleName) {
        foreach ($headers as $col => $header) {
            if (stripos($header, $possibleName) !== false) {
                $foundColumn = $col;
                echo "Found location column: {$header} (Column {$col})\n";
                break 2;
            }
        }
    }
    
    if ($foundColumn) {
        echo "\nLocation distribution:\n";
        $locations = [];
        for ($row = 2; $row <= $sheet->getHighestRow(); $row++) {
            $loc = $sheet->getCell($foundColumn . $row)->getValue();
            if ($loc) {
                $loc = trim($loc);
                if (!isset($locations[$loc])) {
                    $locations[$loc] = 0;
                }
                $locations[$loc]++;
            }
        }
        
        arsort($locations);
        $count = 0;
        foreach ($locations as $loc => $num) {
            echo "  - {$loc}: {$num}\n";
            $count++;
            if ($count >= 15) {
                echo "  ... and " . (count($locations) - $count) . " more\n";
                break;
            }
        }
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== DONE ===\n";
