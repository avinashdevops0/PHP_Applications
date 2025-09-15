CREATE DATABASE tech_showcase;
USE tech_showcase;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    brand VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    description TEXT,
    price DECIMAL(10,2),
    image_url VARCHAR(255),
    os_version VARCHAR(50),
    features TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, brand, model, description, price, image_url, os_version, features) VALUES
('iPhone 17 Pro', 'Apple', 'iPhone 17 Pro', 'The most powerful iPhone ever with groundbreaking features', 1299.99, 'images/iphone17pro.jpg', 'iOS 26', 'A19 Pro chip, 48MP camera, Action button, USB-C, Dynamic Island'),
('iPhone 17', 'Apple', 'iPhone 17', 'The advanced iPhone with powerful capabilities', 999.99, 'images/iphone17.jpg', 'iOS 26', 'A18 chip, Advanced dual-camera system, USB-C, Ceramic Shield'),
('iPhone 17 Plus', 'Apple', 'iPhone 17 Plus', 'The larger iPhone with all-day battery life', 1199.99, 'images/iphone17plus.jpg', 'iOS 26', 'A18 chip, Advanced dual-camera, Largest battery ever in iPhone'),
('Samsung S25 Ultra', 'Samsung', 'Galaxy S25 Ultra', 'The ultimate Galaxy with built-in S Pen', 1399.99, 'images/s25ultra.jpg', 'Android 15', 'Snapdragon 8 Gen 4, 200MP camera, S Pen, Nightography'),
('Samsung S25+', 'Samsung', 'Galaxy S25+', 'The powerful Galaxy with premium features', 1099.99, 'images/s25plus.jpg', 'Android 15', 'Snapdragon 8 Gen 4, 108MP camera, All-day battery'),
('Samsung S25', 'Samsung', 'Galaxy S25', 'The compact powerhouse with pro-grade camera', 899.99, 'images/s25.jpg', 'Android 15', 'Snapdragon 8 Gen 4, 50MP camera, IP68 rating');