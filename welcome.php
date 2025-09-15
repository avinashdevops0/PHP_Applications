<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch all products
$stmt = $pdo->query("SELECT * FROM products ORDER BY brand, price DESC");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - TechShowcase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main class="container mt-5">
        <div class="row mb-4">
            <div class="col-12">
                <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                <p class="lead">Explore our latest collection of cutting-edge devices.</p>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="border-bottom pb-2">iPhone 17 Series with iOS 26</h2>
            </div>
        </div>
        
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            <?php foreach ($products as $product): ?>
                <?php if ($product['brand'] === 'Apple'): ?>
                    <div class="col">
                        <div class="card h-100 product-card">
                            <div class="card-header bg-apple text-white">
                                <h5 class="card-title mb-0"><?php echo htmlspecialchars($product['name']); ?></h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($product['model']); ?></h6>
                                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item"><strong>OS:</strong> <?php echo htmlspecialchars($product['os_version']); ?></li>
                                    <li class="list-group-item"><strong>Price:</strong> $<?php echo htmlspecialchars($product['price']); ?></li>
                                </ul>
                                <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($product['features']); ?></small></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="border-bottom pb-2">Samsung S25 Series</h2>
            </div>
        </div>
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($products as $product): ?>
                <?php if ($product['brand'] === 'Samsung'): ?>
                    <div class="col">
                        <div class="card h-100 product-card">
                            <div class="card-header bg-samsung text-white">
                                <h5 class="card-title mb-0"><?php echo htmlspecialchars($product['name']); ?></h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($product['model']); ?></h6>
                                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item"><strong>OS:</strong> <?php echo htmlspecialchars($product['os_version']); ?></li>
                                    <li class="list-group-item"><strong>Price:</strong> $<?php echo htmlspecialchars($product['price']); ?></li>
                                </ul>
                                <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($product['features']); ?></small></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>