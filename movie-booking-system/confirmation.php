<?php
require_once 'includes/auth.php';
redirectIfNotLoggedIn();

if (!isset($_SESSION['booking'])) {
    header('Location: dashboard.php');
    exit;
}

$booking = $_SESSION['booking'];

require_once 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Booking Confirmed!</h3>
            </div>
            <div class="card-body">
                <div class="alert alert-success">
                    <h4><i class="fas fa-check-circle"></i> Thank you for your booking!</h4>
                    <p class="mb-0">A confirmation email has been sent to <?php echo $booking['email']; ?></p>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4>Booking Details</h4>
                        <div class="mb-2">
                            <strong>Movie:</strong> <?php echo $booking['movie_title']; ?>
                        </div>
                        <div class="mb-2">
                            <strong>Showtime:</strong> <?php echo $booking['showtime']; ?>
                        </div>
                        <div class="mb-2">
                            <strong>Number of seats:</strong> <?php echo $booking['seats']; ?>
                        </div>
                        <div class="mb-2">
                            <strong>Total amount:</strong> $<?php echo number_format($booking['total'], 2); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Customer Information</h4>
                        <div class="mb-2">
                            <strong>Name:</strong> <?php echo $booking['name']; ?>
                        </div>
                        <div class="mb-2">
                            <strong>Email:</strong> <?php echo $booking['email']; ?>
                        </div>
                        <div class="mb-2">
                            <strong>Booking reference:</strong> #<?php echo rand(100000, 999999); ?>
                        </div>
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <a href="dashboard.php" class="btn btn-primary me-md-2">Book Another Movie</a>
                    <a href="index.php" class="btn btn-outline-secondary">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Clear the booking session after confirmation
unset($_SESSION['booking']);

require_once 'includes/footer.php';
?>