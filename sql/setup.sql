CREATE DATABASE sbv_car_rental;
USE sbv_car_rental;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    type VARCHAR(50) NOT NULL,
    price_per_day DECIMAL(10,2) NOT NULL,
    image_url VARCHAR(255),
    description TEXT,
    features TEXT,
    availability TINYINT DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    vehicle_id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id)
);

INSERT INTO vehicles (make, model, year, type, price_per_day, image_url, description, features) VALUES
('Toyota', 'Camry', 2023, 'Sedan', 45.99, 'images/cars/toyota-camry.jpg', 'Comfortable and reliable sedan with great fuel economy', 'Bluetooth, Navigation, Backup Camera, Apple CarPlay, Android Auto'),
('Honda', 'CR-V', 2023, 'SUV', 59.99, 'images/cars/honda-cr-v.jpg', 'Spacious SUV perfect for family trips', 'All-Wheel Drive, Heated Seats, Sunroof, Premium Sound System'),
('BMW', '5 Series', 2023, 'Luxury', 89.99, 'images/cars/bmw-5-series.jpg', 'Luxury sedan with premium features and performance', 'Leather Seats, Panoramic Sunroof, Premium Sound, Navigation'),
('Ford', 'Mustang', 2023, 'Sports', 75.99, 'images/cars/ford-mustang.jpg', 'Iconic sports car with powerful performance', 'V8 Engine, Sport Mode, Premium Sound, Racing Seats'),
('Jeep', 'Wrangler', 2023, 'SUV', 65.99, 'images/cars/jeep-wrangler.jpg', 'Off-road capable SUV for adventure seekers', '4WD, Convertible Top, All-Terrain Tires, Tow Package'),
('Tesla', 'Model 3', 2023, 'Electric', 79.99, 'images/cars/tesla-model-3.jpg', 'Premium electric vehicle with autopilot features', 'Electric, Autopilot, Glass Roof, Premium Sound'),
('Mercedes', 'E-Class', 2023, 'Luxury', 95.99, 'images/cars/mercedes-e-class.jpg', 'Elegant luxury sedan with advanced technology', 'Leather Interior, Premium Sound, Massage Seats, Night Vision'),
('Chevrolet', 'Tahoe', 2023, 'SUV', 85.99, 'images/cars/chevrolet-tahoe.jpg', 'Full-size SUV with ample space for passengers and cargo', 'Third Row Seating, DVD Player, Heated Seats, Tow Package');