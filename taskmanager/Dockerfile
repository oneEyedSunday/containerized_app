# FROM oneeyedsunday/barebones-node as node_base
FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y --fix-missing \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm \
    curl \
    wget \
    gnupg2


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# COPY

COPY ./ /var/www/

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user

# RUN apt-get install nodejs -y && apt-get install npm -y
# RUN apt-get install curl wget gnupg2 -y --fix-missing

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user && \
    chown -R $user:$user /var/www/storage && \
    chown -R $user:$user /var/www/public


# RUN npm cache clean -f
# RUN npm install -g n
# RUN n stable


# Set working directory
WORKDIR /var/www

RUN /usr/bin/composer install
RUN npm i
RUN npm run prod
RUN php artisan key:generate
# RUN php artisan migrate

USER $user

CMD ["sh", "start.sh"]
