<?php
/**
 * Create MySQL Database for SIMAKATA
 */

// Load environment variables
if (file_exists('.env')) {
    $env = parse_ini_file('.env');
} else {
    die("Error: .env file not found!\n");
}

$host = $env['DB_HOST'] ?? '127.0.0.1';
$port = $env['DB_PORT'] ?? '3306';
$database = $env['DB_DATABASE'] ?? 'simakata';
$username = $env['DB_USERNAME'] ?? 'root';
$password = $env['DB_PASSWORD'] ?? '';

echo "\n";
echo "╔════════════════════════════════════════════════════════════════╗\n";
echo "║         CREATE MYSQL DATABASE - SIMAKATA                       ║\n";
echo "╚════════════════════════════════════════════════════════════════╝\n";
echo "\n";

echo "Database Configuration:\n";
echo "  Host     : $host:$port\n";
echo "  Database : $database\n";
echo "  Username : $username\n";
echo "  Password : " . (empty($password) ? '(empty)' : '***') . "\n";
echo "\n";

try {
    // Connect to MySQL without database
    $dsn = "mysql:host=$host;port=$port";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✅ Connected to MySQL server\n";
    
    // Check if database exists
    $stmt = $pdo->query("SHOW DATABASES LIKE '$database'");
    $exists = $stmt->rowCount() > 0;
    
    if ($exists) {
        echo "⚠️  Database '$database' already exists\n";
        echo "\n";
        echo "Options:\n";
        echo "  1. Keep existing database (migrations will update)\n";
        echo "  2. Drop and recreate (WARNING: ALL DATA WILL BE LOST!)\n";
        echo "\n";
        echo "Continuing with existing database...\n";
    } else {
        // Create database
        $pdo->exec("CREATE DATABASE `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        echo "✅ Database '$database' created successfully!\n";
    }
    
    echo "\n";
    echo "Next steps:\n";
    echo "  1. Run: php artisan migrate\n";
    echo "  2. Run: php artisan db:seed\n";
    echo "\n";
    
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "\n";
    echo "Possible issues:\n";
    echo "  • MySQL server not running (start Laragon)\n";
    echo "  • Wrong username/password in .env\n";
    echo "  • Wrong host/port in .env\n";
    echo "\n";
    exit(1);
}

echo "╚════════════════════════════════════════════════════════════════╝\n";
echo "\n";
