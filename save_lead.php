<?php
require_once('config/db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO appointments (name, phone, service) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['phone'], $_POST['service']]);
    echo "<script>alert('Appointment Submitted! We will call you.'); window.location='index.php';</script>";
}
?>
