<?php
// Database Path
$db_path = __DIR__ . '/../database/clinic.db';

try {
    $pdo = new PDO("sqlite:$db_path");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Auto-Create Tables Logic
    $query = "
    CREATE TABLE IF NOT EXISTS settings (
        id INTEGER PRIMARY KEY CHECK (id = 1), 
        clinic_name TEXT, logo TEXT, email TEXT, phone TEXT, address TEXT, maps_url TEXT
    );
    CREATE TABLE IF NOT EXISTS services (
        id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, description TEXT, icon TEXT, slug TEXT
    );
    CREATE TABLE IF NOT EXISTS appointments (
        id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, phone TEXT, service TEXT, message TEXT, status TEXT DEFAULT 'New', created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS admin_users (
        id INTEGER PRIMARY KEY AUTOINCREMENT, username TEXT UNIQUE, password TEXT
    );
    CREATE TABLE IF NOT EXISTS seo_data (
        page TEXT PRIMARY KEY, title TEXT, description TEXT, keywords TEXT
    );";

    $pdo->exec($query);

    // Default Admin (User: admin | Pass: admin123) - Change after first login
    $adminCheck = $pdo->query("SELECT COUNT(*) FROM admin_users")->fetchColumn();
    if($adminCheck == 0) {
        $hash = password_hash("admin123", PASSWORD_BCRYPT);
        $pdo->prepare("INSERT INTO admin_users (username, password) VALUES (?, ?)")->execute(['admin', $hash]);
    }

} catch (PDOException $e) {
    die("Database Connection Error: " . $e->getMessage());
}
?>
