<?php include_once('config/db.php'); 
// Fetch SEO for current page
$current_page = basename($_SERVER['PHP_SELF']);
$seo = $pdo->prepare("SELECT * FROM seo_data WHERE page = ?");
$seo->execute([$current_page]);
$meta = $seo->fetch() ?: ['title' => 'Shriram Dental Clinic', 'description' => 'Best Dentist in Rajaji Puram, Lucknow'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $meta['title']; ?></title>
    <meta name="description" content="<?php echo $meta['description']; ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .medical-blue { background-color: #004aad; }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-700">Shriram Dental</h1>
            <div class="hidden md:flex space-x-8 font-medium">
                <a href="#services" class="hover:text-blue-600">Services</a>
                <a href="#about" class="hover:text-blue-600">About Dr. Shriram</a>
                <a href="#contact" class="hover:text-blue-600">Contact</a>
                <a href="#book" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700">Book Appointment</a>
            </div>
        </div>
    </nav>
