<?php
// Define global variables for company information
$company_name = "SBV-Tech House Rent";
$company_phone = "+1 (555) 123-4567";
$company_email = "info@sbv-tech-rent.com";
$company_address = "123 Rental Avenue, Suite 456, San Francisco, CA 94107";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $company_name; ?></title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Header Styles */
        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
        }
        
        .logo span {
            color: #3498db;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 1.5rem;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        nav ul li a:hover {
            color: #3498db;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 5rem 1rem;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
        }
        
        .btn {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 0.8rem 1.5rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .btn:hover {
            background: #2980b9;
        }
        
        /* Features Section */
        .features {
            padding: 4rem 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .section-title p {
            color: #7f8c8d;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 5px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .feature-card i {
            font-size: 2.5rem;
            color: #3498db;
            margin-bottom: 1rem;
        }
        
        .feature-card h3 {
            margin-bottom: 1rem;
            color: #2c3e50;
        }
        
        /* Properties Section */
        .properties {
            padding: 4rem 0;
            background-color: #ecf0f1;
        }
        
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .property-card {
            background: white;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .property-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .property-details {
            padding: 1.5rem;
        }
        
        .property-details h3 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .property-details p {
            color: #7f8c8d;
            margin-bottom: 1rem;
        }
        
        .price {
            color: #3498db;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        /* Footer */
        footer {
            background: #2c3e50;
            color: white;
            padding: 3rem 0 1rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-section h3 {
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }
        
        .footer-section p, .footer-section a {
            color: #bdc3c7;
            margin-bottom: 0.5rem;
            display: block;
            text-decoration: none;
        }
        
        .footer-section a:hover {
            color: #3498db;
        }
        
        .copyright {
            text-align: center;
            padding-top: 1rem;
            border-top: 1px solid #34495e;
            color: #bdc3c7;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            nav ul {
                margin-top: 1rem;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="logo"><?php echo $company_name; ?></div>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#properties">Properties</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="home" class="hero">
        <div class="container">
            <h1>Find Your Dream Rental Home</h1>
            <p>Experience the best house rental service with SBV-Tech. We offer premium properties at affordable prices with exceptional customer service.</p>
            <a href="#properties" class="btn">Browse Properties</a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose SBV-Tech</h2>
                <p>We provide the best rental experience for our clients</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <i>🏠</i>
                    <h3>Premium Properties</h3>
                    <p>Handpicked selection of high-quality homes in prime locations.</p>
                </div>
                <div class="feature-card">
                    <i>💰</i>
                    <h3>Affordable Prices</h3>
                    <p>Competitive pricing with flexible payment options to suit your budget.</p>
                </div>
                <div class="feature-card">
                    <i>🔑</i>
                    <h3>Quick Process</h3>
                    <p>Streamlined rental process to get you into your new home faster.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="properties" class="properties">
        <div class="container">
            <div class="section-title">
                <h2>Featured Properties</h2>
                <p>Explore our handpicked selection of rental homes</p>
            </div>
            <div class="properties-grid">
                <div class="property-card">
                    <div class="property-image" style="background-image: url('https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');"></div>
                    <div class="property-details">
                        <h3>Modern Downtown Apartment</h3>
                        <p>2 Beds | 2 Baths | 1100 sq ft</p>
                        <p class="price">$2,500/month</p>
                    </div>
                </div>
              <div class="property-card">
    <div class="property-image" style="background-image: url('https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"></div>
    <div class="property-details">
        <h3>Suburban Family Home</h3>
        <p>4 Beds | 3 Baths | 2200 sq ft</p>
        <p class="price">$3,200/month</p>
    </div>
  </div>
        <div class="property-card">
                    <div class="property-image" style="background-image: url('https://images.unsplash.com/photo-1605146769289-440113cc3d00?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');"></div>
                    <div class="property-details">
                        <h3>Luxury Waterfront Condo</h3>
                        <p>3 Beds | 2.5 Baths | 1800 sq ft</p>
                        <p class="price">$4,800/month</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="features">
        <div class="container">
            <div class="section-title">
                <h2>About SBV-Tech House Rent</h2>
                <p>Your trusted partner in finding the perfect rental home</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>Our Mission</h3>
                    <p>To provide exceptional rental experiences through quality properties, transparent processes, and outstanding customer service.</p>
                </div>
                <div class="feature-card">
                    <h3>Our Team</h3>
                    <p>Experienced real estate professionals dedicated to helping you find the perfect home that meets your needs and budget.</p>
                </div>
                <div class="feature-card">
                    <h3>Our Values</h3>
                    <p>Integrity, transparency, and customer satisfaction are at the core of everything we do.</p>
                </div>
            </div>
        </div>
    </section>

    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p><?php echo $company_phone; ?></p>
                    <p><?php echo $company_email; ?></p>
                    <p><?php echo $company_address; ?></p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <a href="#home">Home</a>
                    <a href="#properties">Properties</a>
                    <a href="#about">About Us</a>
                    <a href="#contact">Contact</a>
                </div>
                <div class="footer-section">
                    <h3>Office Hours</h3>
                    <p>Monday-Friday: 9am-6pm</p>
                    <p>Saturday: 10am-4pm</p>
                    <p>Sunday: Closed</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php echo $company_name; ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
