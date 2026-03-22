<?php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once('../config/db.php');

// Fetch Stats
$total_leads = $pdo->query("SELECT COUNT(*) FROM appointments")->fetchColumn();
$recent_leads = $pdo->query("SELECT * FROM appointments ORDER BY id DESC LIMIT 5")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body class="bg-gray-100 flex">

    <div class="w-64 bg-slate-800 min-h-screen text-white p-6">
        <h2 class="text-xl font-bold mb-10 border-b pb-4">CMS Panel</h2>
        <nav class="space-y-4">
            <a href="dashboard.php" class="block p-2 bg-blue-600 rounded"><i class="fa fa-home mr-2"></i> Dashboard</a>
            <a href="appointments.php" class="block p-2 hover:bg-slate-700"><i class="fa fa-calendar-check mr-2"></i> Appointments</a>
            <a href="services.php" class="block p-2 hover:bg-slate-700"><i class="fa fa-tooth mr-2"></i> Services</a>
            <a href="seo-settings.php" class="block p-2 hover:bg-slate-700"><i class="fa fa-search mr-2"></i> SEO Manager</a>
            <a href="settings.php" class="block p-2 hover:bg-slate-700"><i class="fa fa-cog mr-2"></i> Global Settings</a>
            <a href="logout.php" class="block p-2 text-red-400 hover:text-red-300 mt-20"><i class="fa fa-sign-out mr-2"></i> Logout</a>
        </nav>
    </div>

    <div class="flex-1 p-10">
        <header class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800">Welcome, <?php echo $_SESSION['admin_name']; ?></h1>
            <div class="bg-white p-2 px-4 rounded shadow text-sm">Today: <?php echo date('d M, Y'); ?></div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                <p class="text-gray-500 text-sm uppercase font-bold">Total Appointments</p>
                <h3 class="text-3xl font-bold"><?php echo $total_leads; ?></h3>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
                <p class="text-gray-500 text-sm uppercase font-bold">New Leads (24h)</p>
                <h3 class="text-3xl font-bold">--</h3>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6 border-b bg-gray-50 font-bold">Recent Appointments</div>
            <table class="w-full text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="p-4">Patient Name</th>
                        <th class="p-4">Phone</th>
                        <th class="p-4">Service</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($recent_leads as $lead): ?>
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-4 font-medium"><?php echo $lead['name']; ?></td>
                        <td class="p-4"><?php echo $lead['phone']; ?></td>
                        <td class="p-4 text-blue-600"><?php echo $lead['service']; ?></td>
                        <td class="p-4"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs"><?php echo $lead['status']; ?></span></td>
                        <td class="p-4 text-gray-500"><?php echo $lead['created_at']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
