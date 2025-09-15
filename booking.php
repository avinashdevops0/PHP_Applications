<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_GET['vehicle_id'])) {
    header('Location: dashboard.php');
    exit();
}

$vehicle_id = $_GET['vehicle_id'];
$stmt = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
$stmt->execute([$vehicle_id]);
$vehicle = $stmt->fetch();

if (!$vehicle) {
    header('Location: dashboard.php');
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    if (empty($start_date) || empty($end_date)) {
        $error = 'Please select both start and end dates.';
    } elseif (strtotime($start_date) < strtotime('today')) {
        $error = 'Start date cannot be in the past.';
    } elseif (strtotime($end_date) <= strtotime($start_date)) {
        $error = 'End date must be after start date.';
    } else {
        // Calculate number of days and total price
        $days = (strtotime($end_date) - strtotime($start_date)) / (60 * 60 * 24);
        $total_price = $days * $vehicle['price_per_day'];
        
        // Create booking
        $user_id = $_SESSION['user_id'];
        $stmt = $pdo->prepare("INSERT INTO bookings (user_id, vehicle_id, start_date, end_date, total_price) VALUES (?, ?, ?, ?, ?)");
        
        if ($stmt->execute([$user_id, $vehicle_id, $start_date, $end_date, $total_price])) {
            $success = 'Booking successful! Your reservation is now pending confirmation.';
        } else {
            $error = 'Booking failed. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Vehicle - SBV-Tech Car Rentals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center mb-0">Book Vehicle</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        
                        <?php if ($success): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                            <div class="text-center mt-4">
                                <a href="dashboard.php" class="btn btn-primary">Return to Dashboard</a>
                            </div>
                        <?php else: ?>
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="<?php echo $vehicle['image_url']; ?>" class="img-fluid rounded" alt="<?php echo $vehicle['make'] . ' ' . $vehicle['model']; ?>">
                                    <div class="mt-3">
                                        <h4><?php echo $vehicle['make'] . ' ' . $vehicle['model']; ?></h4>
                                        <p class="text-muted"><?php echo $vehicle['year'] . ' • ' . $vehicle['type']; ?></p>
                                        <p><?php echo $vehicle['description']; ?></p>
                                        <h5 class="text-primary">$<?php echo $vehicle['price_per_day']; ?>/day</h5>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <form method="post" action="">
                                        <h4 class="mb-4">Booking Details</h4>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="start_date" class="form-label">Start Date</label>
                                                <input type="date" class="form-control" id="start_date" name="start_date" min="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="end_date" class="form-label">End Date</label>
                                                <input type="date" class="form-control" id="end_date" name="end_date" min="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <h5>Price Calculation</h5>
                                            <div id="price-calculation" class="bg-light p-3 rounded">
                                                <p class="mb-1">Select dates to see pricing</p>
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-lg">Confirm Booking</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Price calculation
        const pricePerDay = <?php echo $vehicle['price_per_day']; ?>;
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const priceCalculation = document.getElementById('price-calculation');
        
        function calculatePrice() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            
            if (startDateInput.value && endDateInput.value && endDate > startDate) {
                const days = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
                const totalPrice = days * pricePerDay;
                
                priceCalculation.innerHTML = `
                    <div class="d-flex justify-content-between">
                        <span>${days} days x $${pricePerDay.toFixed(2)}</span>
                        <span>$${totalPrice.toFixed(2)}</span>
                    </div>
                `;
            } else {
                priceCalculation.innerHTML = '<p class="mb-1">Select dates to see pricing</p>';
            }
        }
        
        startDateInput.addEventListener('change', calculatePrice);
        endDateInput.addEventListener('change', calculatePrice);
    </script>

    <?php include 'includes/footer.php'; ?>
</body>
</html>