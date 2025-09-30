# Use official PHP 8.2 with Apache pre-installed
FROM php:8.2-apache

# Install required PHP extensions for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy application files into Apache document root
COPY . /var/www/html/

# Expose port 80 so Docker knows the container listens on it
EXPOSE 80

# Apache is started automatically by the base image, so no CMD needed
