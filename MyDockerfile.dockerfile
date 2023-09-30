# Use the official PHP with Apache image as the base image
FROM php:apache

# Install system dependencies required for mysqli extension
RUN apt-get update && apt-get install -y \
    libzip-dev \
    && docker-php-ext-install mysqli zip \
    && a2enmod rewrite

# Copy your PHP application files into the container's web directory
COPY . /var/www/html/

# Expose port 80 for Apache
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]