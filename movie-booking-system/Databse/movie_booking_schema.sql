-- Create database
CREATE DATABASE IF NOT EXISTS movie_booking;
USE movie_booking;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Movies table
CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    genre VARCHAR(50),
    duration INT,
    poster_url VARCHAR(500),
    rating DECIMAL(2,1),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Theaters table
CREATE TABLE theaters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(255) NOT NULL,
    total_seats INT NOT NULL
);

-- Showtimes table
CREATE TABLE showtimes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    theater_id INT NOT NULL,
    showtime DATETIME NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    available_seats INT NOT NULL,
    FOREIGN KEY (movie_id) REFERENCES movies(id),
    FOREIGN KEY (theater_id) REFERENCES theaters(id)
);

-- Bookings table
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    showtime_id INT NOT NULL,
    seats INT NOT NULL,
    total_amount DECIMAL(8,2) NOT NULL,
    booking_reference VARCHAR(20) UNIQUE NOT NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (showtime_id) REFERENCES showtimes(id)
);

-- Insert sample data
INSERT INTO movies (title, description, genre, duration, poster_url, rating) VALUES
('Avengers: Endgame', 'The epic conclusion to the Infinity Saga.', 'Action', 181, 'https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_FMjpg_UX1000_.jpg', 8.4),
('The Batman', 'The Dark Knight of Gotham City sets out to dismantle the criminal underworld.', 'Action', 176, 'https://m.media-amazon.com/images/M/MV5BMDdmMTBiNTYtMDIzNi00NGVlLWIzMDYtZTk3MTQ3NGQxZGEwXkEyXkFqcGdeQXVyMzMwOTU5MDk@._V1_FMjpg_UX1000_.jpg', 7.8),
('Dune', 'A noble family becomes embroiled in a war for control over the galaxy''s most valuable asset.', 'Sci-Fi', 155, 'https://m.media-amazon.com/images/M/MV5BN2FjNmEyNWMtYzM0ZS00NjIyLTg5YzYtYThlMGVjNzE1OGViXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX1000_.jpg', 8.0),
('Spider-Man: No Way Home', 'With Spider-Man''s identity now revealed, Peter asks Doctor Strange for help.', 'Action', 148, 'https://m.media-amazon.com/images/M/MV5BZWMyYzFjYTYtNTRjYi00OGExLWE2YzgtOGRmYjAxZTU3NzBiXkEyXkFqcGdeQXVyMzQ0MzA0NTM@._V1_FMjpg_UX1000_.jpg', 8.2),
('Top Gun: Maverick', 'After thirty years, Maverick is still pushing the envelope as a top naval aviator.', 'Action', 131, 'https://m.media-amazon.com/images/M/MV5BOWQwOTA1ZDQtNzk3Yi00ZmVmLWFiZGYtNjdjNThiYjJhNzRjXkEyXkFqcGdeQXVyODE5NzE3OTE@._V1_FMjpg_UX1000_.jpg', 8.3);

INSERT INTO theaters (name, location, total_seats) VALUES
('Cineplex Downtown', '123 Main St, City Center', 200),
('Starlight Theater', '456 Oak Ave, Westside', 150),
('Metro Cinema', '789 Elm Blvd, East End', 180);

INSERT INTO showtimes (movie_id, theater_id, showtime, price, available_seats) VALUES
(1, 1, '2023-12-15 18:00:00', 12.99, 200),
(1, 2, '2023-12-15 19:30:00', 11.99, 150),
(2, 3, '2023-12-15 20:00:00', 13.99, 180),
(3, 1, '2023-12-16 17:30:00', 12.99, 200),
(4, 2, '2023-12-16 19:00:00', 11.99, 150),
(5, 3, '2023-12-16 20:30:00', 13.99, 180);
