FROM php:8.1-fpm

# instalamos las dependencias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# limiamos cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# instalamos extensiones PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# obtenemos Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# establecemos el directorio de trabajo
WORKDIR /var/www

# copiamos los archivos de la aplicación
COPY . .

# instalamos las dependencias de composer
RUN composer install

# establecemos permisos
RUN chown -R www-data:www-data /var/www/storage