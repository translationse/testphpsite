<?php
// Database Path
$db_path = __DIR__ . '/../database/clinic.db';

try {
    // SQLite3 Connection
    $pdo = new PDO("sqlite:$db_path");
    
    // Error mode set to Exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
