# Use the official PHP-Apache image
FROM php:8.1-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install MySQL Server
RUN apt-get update && apt-get install -y mysql-server && rm -rf /var/lib/apt/lists/*

# Copy project files to the Apache document root
COPY . /var/www/html/

# Set correct file permissions
RUN chown -R www-data:www-data /var/www/html

# Expose ports for Apache and MySQL
EXPOSE 80 3306

# Start MySQL and Apache
CMD service mysql start && apache2-foreground
