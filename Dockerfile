# Utilisez une image de base contenant PHP et Apache
FROM php:8.0-apache

# Copiez les fichiers du projet Symfony dans le conteneur
COPY . /var/www/html

# Installez les dépendances PHP requises
RUN cd /var/www/html && \
    apt-get update && \
    apt-get install -y \
        git \
        zip \
        unzip \
        libpq-dev \
        libzip-dev \
        && \
    docker-php-ext-install pdo pdo_pgsql zip && \
    a2enmod rewrite

# Exposez le port Apache
EXPOSE 80
