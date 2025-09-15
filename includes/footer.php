<footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5><i class="fas fa-car me-2"></i>SBV-Tech Rentals</h5>
                <p>Premium car rental service with a wide selection of vehicles for all your needs.</p>
                <div class="social-icons">
                    <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-light">Home</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="dashboard.php" class="text-light">Dashboard</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="text-light">Login</a></li>
                        <li><a href="register.php" class="text-light">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Vehicle Types</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Economy</a></li>
                    <li><a href="#" class="text-light">SUV</a></li>
                    <li><a href="#" class="text-light">Luxury</a></li>
                    <li><a href="#" class="text-light">Sports</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5>Contact Us</h5>
                <address class="text-light">
                    <p><i class="fas fa-map-marker-alt me-2"></i> 123 Main St, City, State</p>
                    <p><i class="fas fa-phone me-2"></i> (555) 123-4567</p>
                    <p><i class="fas fa-envelope me-2"></i> info@sbvtech.com</p>
                </address>
            </div>
        </div>
        <hr class="bg-light">
        <div class="text-center">
            <p>&copy; <?php echo date('Y'); ?> SBV-Tech Car Rentals. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>