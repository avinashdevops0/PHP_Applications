<footer class="bg-dark text-light mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>TechShowcase</h5>
                <p>Discover the latest in mobile technology with our premium selection of smartphones and devices.</p>
            </div>
            <div class="col-md-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-light">Home</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="welcome.php" class="text-light">Products</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="text-light">Login</a></li>
                        <li><a href="register.php" class="text-light">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Contact Us</h5>
                <address class="text-light">
                    <p>Email: info@techshowcase.com<br>
                    Phone: (123) 456-7890</p>
                </address>
            </div>
        </div>
        <hr class="bg-light">
        <div class="text-center">
            <p>&copy; <?php echo date('Y'); ?> TechShowcase. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>