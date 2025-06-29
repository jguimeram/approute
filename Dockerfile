# Use official PHP image with Composer
FROM php:8.2-cli


# Install system dependencies: git, unzip, and libzip-dev (for zip extension)
RUN apt-get update && \
    apt-get install -y git unzip libzip-dev && \
    rm -rf /var/lib/apt/lists/*

# Install required PHP extensions
RUN docker-php-ext-install zip

# Set working directory
WORKDIR /app

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port 8000
EXPOSE 8000

# Start the built-in PHP server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
