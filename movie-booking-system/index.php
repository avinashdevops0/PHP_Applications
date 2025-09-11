<?php
require_once 'includes/auth.php';
require_once 'includes/header.php';
?>

<div class="hero-section">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold">Book Your Movie Tickets Online</h1>
            <p class="lead">Experience the magic of cinema with our easy online booking system. Browse the latest movies, select your preferred showtimes, and secure your seats in just a few clicks.</p>
            <?php if (!isLoggedIn()): ?>
                <a href="register.php" class="btn btn-primary btn-lg me-2">Get Started</a>
            <?php else: ?>
                <a href="dashboard.php" class="btn btn-primary btn-lg me-2">Book Now</a>
            <?php endif; ?>
            <a href="#features" class="btn btn-outline-secondary btn-lg">Learn More</a>
        </div>
        <div class="col-md-6">
            <img src="https://images.unsplash.com/photo-1489599163802-44c6c52c693f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded" alt="Movie Theater">
        </div>
    </div>
</div>

<section id="features" class="my-5 py-5">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="feature-card p-4">
                <i class="fas fa-ticket-alt fa-3x mb-3 text-primary"></i>
                <h3>Easy Booking</h3>
                <p>Book your tickets in just a few clicks with our intuitive interface.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="feature-card p-4">
                <i class="fas fa-film fa-3x mb-3 text-primary"></i>
                <h3>Wide Selection</h3>
                <p>Choose from the latest blockbusters to indie favorites.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="feature-card p-4">
                <i class="fas fa-mobile-alt fa-3x mb-3 text-primary"></i>
                <h3>Mobile Friendly</h3>
                <p>Book tickets on the go with our mobile-optimized website.</p>
            </div>
        </div>
    </div>
</section>

<section class="my-5 py-5 bg-light">
    <div class="row">
        <div class="col-lg-8 mx-auto text-center">
            <h2 class="mb-4">Now Showing</h2>
            <div class="row" id="now-showing">
                <!-- Movies will be loaded here by JavaScript -->
            </div>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
?>