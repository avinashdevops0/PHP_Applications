<?php
require_once 'includes/auth.php';
redirectIfNotLoggedIn();

// For demo purposes - in a real application, you would fetch movie details from a database
$movies = [
    1 => ['title' => 'Avengers: Endgame', 'price' => 12.99],
    2 => ['title' => 'The Batman', 'price' => 11.99],
    3 => ['title' => 'Dune', 'price' => 13.99],
    4 => ['title' => 'Spider-Man: No Way Home', 'price' => 12.99],
    5 => ['title' => 'Top Gun: Maverick', 'price' => 14.99],
    6 => ['title' => 'Black Panther: Wakanda Forever', 'price' => 13.99],
];

$movieId = $_GET['id'] ?? 0;
if (!isset($movies[$movieId])) {
    header('Location: dashboard.php');
    exit;
}

$movie = $movies[$movieId];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $showtime = $_POST['showtime'] ?? '';
    $seats = $_POST['seats'] ?? 1;
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    
    if ($showtime && $seats && $name && $email) {
        $_SESSION['booking'] = [
            'movie_id' => $movieId,
            'movie_title' => $movie['title'],
            'showtime' => $showtime,
            'seats' => $seats,
            'total' => $seats * $movie['price'],
            'name' => $name,
            'email' => $email
        ];
        
        header('Location: confirmation.php');
        exit;
    } else {
        $error = "Please fill all fields";
    }
}

require_once 'includes/header.php';
?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Book Tickets for <?php echo $movie['title']; ?></h3>
            </div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="showtime" class="form-label">Showtime</label>
                            <select class="form-select" id="showtime" name="showtime" required>
                                <option value="">Select a showtime</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="1:30 PM">1:30 PM</option>
                                <option value="4:45 PM">4:45 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                                <option value="10:30 PM">10:30 PM</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="seats" class="form-label">Number of Seats</label>
                            <input type="number" class="form-control" id="seats" name="seats" min="1" max="10" value="1" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['user_name']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the terms and conditions
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Continue to Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4>Order Summary</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Movie:</span>
                    <span><?php echo $movie['title']; ?></span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Price per ticket:</span>
                    <span>$<?php echo number_format($movie['price'], 2); ?></span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-2">
                    <span>Seats:</span>
                    <span id="seatsCount">1</span>
                </div>
                <div class="d-flex justify-content-between fw-bold">
                    <span>Total:</span>
                    <span id="totalPrice">$<?php echo number_format($movie['price'], 2); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('seats').addEventListener('change', function() {
        const seats = this.value;
        const price = <?php echo $movie['price']; ?>;
        const total = seats * price;
        
        document.getElementById('seatsCount').textContent = seats;
        document.getElementById('totalPrice').textContent = '$' + total.toFixed(2);
    });
</script>

<?php
require_once 'includes/footer.php';
?>