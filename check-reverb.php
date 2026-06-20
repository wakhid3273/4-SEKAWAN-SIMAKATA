<?php
/**
 * Script untuk mengecek apakah Reverb server sudah running
 * Jika belum, akan memberi instruksi untuk menjalankannya
 */

$reverbHost = 'localhost';
$reverbPort = 8080;

echo "\n";
echo "========================================\n";
echo "   REVERB SERVER CONNECTION CHECK\n";
echo "========================================\n\n";

echo "Checking connection to ws://{$reverbHost}:{$reverbPort}...\n\n";

// Cek apakah port Reverb sudah listening
$connection = @fsockopen($reverbHost, $reverbPort, $errno, $errstr, 2);

if (is_resource($connection)) {
    fclose($connection);
    echo "✅ SUCCESS: Reverb server is running!\n";
    echo "   Server: ws://{$reverbHost}:{$reverbPort}\n";
    echo "   Status: CONNECTED\n\n";
    echo "Your real-time features are ready! 🚀\n";
    exit(0);
} else {
    echo "❌ ERROR: Reverb server is NOT running!\n\n";
    echo "To fix this issue, you need to start the Reverb server:\n\n";
    
    echo "Option 1: Use the startup script\n";
    echo "   > Double-click 'START-REVERB.bat'\n\n";
    
    echo "Option 2: Run manually in a new terminal\n";
    echo "   > php artisan reverb:start\n\n";
    
    echo "Option 3: Use npm start (runs all servers)\n";
    echo "   > npm start\n\n";
    
    echo "After starting Reverb, your real-time features will work!\n";
    exit(1);
}
