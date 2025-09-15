<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-car me-2"></i>SBV-Tech Rentals
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo $current_page === 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a>
                </li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">Dashboard</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <span class="nav-link">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'login.php' ? 'active' : ''; ?>" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'register.php' ? 'active' : ''; ?>" href="register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>