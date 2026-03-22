<?php
session_start();
require_once('../config/db.php');
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }

if (isset($_POST['update_seo'])) {
    $stmt = $pdo->prepare("INSERT OR REPLACE INTO seo_data (page, title, description, keywords) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['page_name'], $_POST['meta_title'], $_POST['meta_desc'], $_POST['keywords']]);
    $msg = "SEO Updated for " . $_POST['page_name'];
}
?>
<div class="bg-white p-8 rounded-xl shadow">
    <h2 class="text-xl font-bold mb-6">Manage SEO & Meta Tags</h2>
    <form method="POST" class="space-y-4">
        <select name="page_name" class="w-full border p-2 rounded">
            <option value="index.php">Home Page</option>
            <option value="services.php">Services Page</option>
            <option value="contact.php">Contact Page</option>
        </select>
        <input type="text" name="meta_title" placeholder="Browser Title (Max 60 chars)" class="w-full border p-2 rounded">
        <textarea name="meta_desc" placeholder="Meta Description (Max 160 chars)" class="w-full border p-2 rounded h-24"></textarea>
        <input type="text" name="keywords" placeholder="Keywords (Comma separated)" class="w-full border p-2 rounded">
        <button name="update_seo" class="bg-green-600 text-white px-6 py-2 rounded font-bold">Save SEO Settings</button>
    </form>
</div>
