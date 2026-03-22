<?php
session_start();
require_once('../config/db.php');

// Simple Password Hashing Example (Aap ise setup script mein chalayenge)
// $password = password_hash("Admin@123", PASSWORD_BCRYPT);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_user'] = $user['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Credentials!";
    }
}
?>
