<?php
session_start();
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShowcase - Latest Devices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main class="container mt-5">
        <div class="p-5 mb-4 bg-light rounded-3 hero-section">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Discover the Future of Mobile Technology</h1>
                <p class="col-md-8 fs-4">Experience the revolutionary iPhone 17 series with iOS 26 and the cutting-edge Samsung Galaxy S25 lineup.</p>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a class="btn btn-primary btn-lg" href="register.php">Get Started</a>
                <?php else: ?>
                    <a class="btn btn-primary btn-lg" href="welcome.php">View Products</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6 mb-4">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h2>iPhone 17 Series</h2>
                    <p>Revolutionary design. Incredible performance. Powered by iOS 26 with advanced AI capabilities and enhanced privacy features.</p>
                    <button class="btn btn-outline-light" type="button">Learn More</button>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Samsung S25 Series</h2>
                    <p>Next-level innovation. Stunning displays. Featuring the latest Android 15 with customizable experiences and superior camera technology.</p>
                    <button class="btn btn-outline-secondary" type="button">Learn More</button>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>