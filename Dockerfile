# Use the official PHP-Apache image
FROM php:8.1-apache

# Switch to root user to ensure we have the necessary permissions
USER root

# Set environment variable to avoid interactive prompts during package installation
ENV DEBIAN_FRONTEND=noninteractive

# Update package lists and install necessary packages
RUN apt-get update && \
    apt-get install -y lsb-release gnupg && \
    rm -rf /var/lib/apt/lists/*

# Add MySQL APT repository
RUN echo "deb http://repo.mysql.com/apt/debian/ $(lsb_release -sc) mysql-5.7" > /etc/apt/sources.list.d/mysql.list && \
    apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 5072E1F5 && \
    apt-get update && \
    apt-get install -y mysql-server && \
    rm -rf /var/lib/apt/lists/*

# Enable necessary Apache modules
RUN a2enmod rewrite

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy project files to the Apache document root
COPY . /var/www/html/

# Set correct file permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]


