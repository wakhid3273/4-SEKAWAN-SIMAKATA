<?php
/**
 * Comprehensive Real-time Debugging Tool
 */

echo "\n";
echo "╔════════════════════════════════════════════════════════════════╗\n";
echo "║         REAL-TIME DEBUG TOOL - SIMAKATA                        ║\n";
echo "╔════════════════════════════════════════════════════════════════╗\n";
echo "\n";

// Load .env
if (file_exists('.env')) {
    $env = file_get_contents('.env');
    preg_match('/BROADCAST_CONNECTION=(.*)/', $env, $broadcast);
    preg_match('/REVERB_HOST=(.*)/', $env, $host);
    preg_match('/REVERB_PORT=(.*)/', $env, $port);
    preg_match('/REVERB_APP_KEY=(.*)/', $env, $key);
    
    $broadcast = trim($broadcast[1] ?? 'not set');
    $host = trim($host[1] ?? 'localhost');
    $port = trim($port[1] ?? '8080');
    $key = trim($key[1] ?? 'not set');
} else {
    echo "❌ .env file not found!\n";
    exit(1);
}

echo "1️⃣  CONFIGURATION CHECK\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "Broadcast Driver  : " . ($broadcast === 'reverb' ? "✅ reverb" : "❌ $broadcast (should be 'reverb')") . "\n";
echo "Reverb Host       : $host\n";
echo "Reverb Port       : $port\n";
echo "Reverb App Key    : " . ($key !== 'not set' ? "✅ $key" : "❌ not set") . "\n";
echo "\n";

echo "2️⃣  REVERB SERVER STATUS\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "Testing connection to $host:$port...\n";

$connection = @fsockopen($host, $port, $errno, $errstr, 2);

if (is_resource($connection)) {
    fclose($connection);
    echo "✅ Reverb server is RUNNING\n";
    echo "   Connection: ws://$host:$port\n";
    $reverbRunning = true;
} else {
    echo "❌ Reverb server is NOT RUNNING\n";
    echo "   Error: $errstr ($errno)\n";
    echo "\n";
    echo "   To start Reverb:\n";
    echo "   → php artisan reverb:start\n";
    echo "   → Or double-click: START-REVERB.bat\n";
    $reverbRunning = false;
}
echo "\n";

echo "3️⃣  NETWORK INFORMATION\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

// Get IP addresses
exec('ipconfig', $output);
$ips = [];
foreach ($output as $line) {
    if (preg_match('/IPv4.*?: (.+)/', $line, $match)) {
        $ip = trim($match[1]);
        if ($ip !== '127.0.0.1') {
            $ips[] = $ip;
        }
    }
}

if (!empty($ips)) {
    echo "Your IP Address(es):\n";
    foreach ($ips as $ip) {
        echo "   • $ip\n";
    }
    echo "\n";
    echo "Friends can access at:\n";
    foreach ($ips as $ip) {
        echo "   → http://$ip:8000\n";
    }
} else {
    echo "⚠️  Could not detect network IP\n";
}
echo "\n";

echo "4️⃣  FILES CHECK\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

$files = [
    'resources/js/echo.js' => 'Echo configuration',
    'resources/js/realtime.js' => 'Real-time handlers',
    'resources/js/connection-status.js' => 'Connection indicator',
    'app/Events/PerusahaanCreated.php' => 'Perusahaan events',
    'app/Events/MahasiswaMagangUpdated.php' => 'Mahasiswa events',
];

foreach ($files as $file => $desc) {
    if (file_exists($file)) {
        echo "✅ $desc\n";
    } else {
        echo "❌ $desc (missing: $file)\n";
    }
}
echo "\n";

echo "5️⃣  ASSETS CHECK\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

if (file_exists('public/build/manifest.json')) {
    $manifest = json_decode(file_get_contents('public/build/manifest.json'), true);
    if (isset($manifest['resources/js/app.js'])) {
        echo "✅ Assets compiled (npm run build)\n";
        echo "   App JS: " . $manifest['resources/js/app.js']['file'] . "\n";
    } else {
        echo "⚠️  Assets compiled but app.js not found in manifest\n";
    }
} else {
    echo "❌ Assets NOT compiled\n";
    echo "   Run: npm run build\n";
}
echo "\n";

echo "6️⃣  PORTS CHECK\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

// Check if ports are in use
$ports = [
    8000 => 'Laravel Server',
    8080 => 'Reverb Server',
];

foreach ($ports as $portNum => $service) {
    exec("netstat -ano | findstr :$portNum", $netstat);
    if (!empty($netstat)) {
        echo "✅ Port $portNum ($service) is in use\n";
        foreach ($netstat as $line) {
            if (strpos($line, 'LISTENING') !== false) {
                echo "   $line\n";
                break;
            }
        }
    } else {
        echo "❌ Port $portNum ($service) is NOT in use\n";
    }
}
echo "\n";

echo "7️⃣  RECOMMENDATIONS\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

if (!$reverbRunning) {
    echo "🔴 CRITICAL: Start Reverb server first!\n";
    echo "   → php artisan reverb:start\n";
    echo "\n";
}

if ($broadcast !== 'reverb') {
    echo "⚠️  WARNING: BROADCAST_CONNECTION in .env is '$broadcast'\n";
    echo "   Should be 'reverb' for real-time to work\n";
    echo "\n";
}

if ($host === 'localhost' && !empty($ips)) {
    echo "💡 TIP: For multi-device access:\n";
    echo "   1. Update .env:\n";
    echo "      REVERB_HOST={$ips[0]}\n";
    echo "      VITE_REVERB_HOST={$ips[0]}\n";
    echo "   2. Rebuild: npm run build\n";
    echo "   3. Start servers with --host=0.0.0.0\n";
    echo "\n";
}

if ($reverbRunning) {
    echo "✅ Everything looks good! Test in browser:\n";
    echo "   1. Open: http://localhost:8000\n";
    echo "   2. Press F12 → Console\n";
    echo "   3. Look for: 'WebSocket connected successfully'\n";
    echo "   4. Check indicator: 'Real-time Active' (green)\n";
}

echo "\n";
echo "╚════════════════════════════════════════════════════════════════╝\n";
echo "\n";
