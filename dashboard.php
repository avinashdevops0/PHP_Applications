<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch all available vehicles
$stmt = $pdo->query("SELECT * FROM vehicles WHERE availability = 1 ORDER BY price_per_day");
$vehicles = $stmt->fetchAll();

// Fetch user's bookings
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT b.*, v.make, v.model, v.image_url 
                      FROM bookings b 
                      JOIN vehicles v ON b.vehicle_id = v.id 
                      WHERE b.user_id = ? 
                      ORDER BY b.created_at DESC 
                      LIMIT 3");
$stmt->execute([$user_id]);
$bookings = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SBV-Tech Car Rentals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-12">
                <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                <p class="lead">Browse our fleet and manage your rentals</p>
            </div>
        </div>
        
        <!-- Recent Bookings -->
        <?php if (!empty($bookings)): ?>
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="mb-4">Your Recent Bookings</h2>
                    <div class="row">
                        <?php foreach ($bookings as $booking): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card booking-card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $booking['make'] . ' ' . $booking['model']; ?></h5>
                                        <p class="card-text">
                                            <strong>Dates:</strong> <?php echo date('M j, Y', strtotime($booking['start_date'])); ?> - <?php echo date('M j, Y', strtotime($booking['end_date'])); ?><br>
                                            <strong>Total:</strong> $<?php echo $booking['total_price']; ?><br>
                                            <strong>Status:</strong> <span class="badge bg-<?php 
                                                switch($booking['status']) {
                                                    case 'confirmed': echo 'success'; break;
                                                    case 'pending': echo 'warning'; break;
                                                    case 'completed': echo 'info'; break;
                                                    case 'cancelled': echo 'danger'; break;
                                                    default: echo 'secondary';
                                                }
                                            ?>"><?php echo ucfirst($booking['status']); ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Vehicle Fleet -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="mb-4">Our Vehicle Fleet</h2>
                <div class="row">
                    <?php foreach ($vehicles as $vehicle): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
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
                                        <a href="booking.php?vehicle_id=<?php echo $vehicle['id']; ?>" class="btn btn-primary">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>