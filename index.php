<?php
session_start();
require_once 'config/database.php';

// Fetch featured vehicles
$stmt = $pdo->query("SELECT * FROM vehicles WHERE availability = 1 ORDER BY RAND() LIMIT 3");
$featured_vehicles = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBV-Tech Car Rentals - Premium Vehicles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hero-content">
                    <h1>Premium Car Rentals</h1>
                    <p>Experience luxury and comfort with our premium fleet of vehicles. Whether for business or leisure, we have the perfect car for your needs.</p>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <a href="register.php" class="btn btn-primary">Get Started</a>
                    <?php else: ?>
                        <a href="dashboard.php" class="btn btn-primary">View Fleet</a>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 hero-image">
                    <img src="images/cars/hero-car.png" alt="Luxury Car" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2>Why Choose SBV-Tech?</h2>
                    <p class="lead">We offer the best car rental experience</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h3>Best Prices</h3>
                    <p>Competitive pricing with no hidden fees. Get the best value for your money.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h3>Premium Fleet</h3>
                    <p>Well-maintained vehicles from economy to luxury classes. Always clean and reliable.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Our customer service team is available around the clock to assist you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Vehicles -->
    <section class="featured-vehicles py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2>Featured Vehicles</h2>
                    <p class="lead">Explore our most popular rentals</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($featured_vehicles as $vehicle): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card vehicle-card h-100">
                            <img src="<?php echo $vehicle['image_url']; ?>" class="card-img-top" alt="<?php echo $vehicle['make'] . ' ' . $vehicle['model']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $vehicle['make'] . ' ' . $vehicle['model']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $vehicle['year'] . ' • ' . $vehicle['type']; ?></h6>
                                <p class="card-text"><?php echo substr($vehicle['description'], 0, 100) . '...'; ?></p>
                                <div class="vehicle-features mb-3">
                                    <small><?php echo substr($vehicle['features'], 0, 50) . '...'; ?></small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price">$<?php echo $vehicle['price_per_day']; ?>/day</span>
                                    <?php if (isset($_SESSION['user_id'])): ?>
                                        <a href="booking.php?vehicle_id=<?php echo $vehicle['id']; ?>" class="btn btn-primary">Rent Now</a>
                                    <?php else: ?>
                                        <a href="login.php" class="btn btn-outline-primary">Login to Rent</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>