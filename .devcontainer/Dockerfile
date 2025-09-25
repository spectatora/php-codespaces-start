# syntax=docker/dockerfile:1

ARG VARIANT="8.4"
FROM php:${VARIANT}-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    wget \
    zip \
    libzip-dev \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Create a non-root user for VS Code
ARG USERNAME=vscode
ARG USER_UID=1000
ARG USER_GID=$USER_UID
RUN groupadd --gid $USER_GID $USERNAME \
    && useradd --uid $USER_UID --gid $USER_GID -m $USERNAME \
    && apt-get update \
    && apt-get install -y sudo \
    && echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME \
    && chmod 0440 /etc/sudoers.d/$USERNAME

# Install common dependencies and Composer
RUN apt-get update \
    && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y --no-install-recommends git unzip wget \
    && rm -rf /var/lib/apt/lists/* \
    && wget -q https://getcomposer.org/installer -O composer-setup.php \
    && wget -q https://composer.github.io/installer.sig -O composer.sig \
    && php -r "if (hash_file('sha384', 'composer-setup.php') !== trim(file_get_contents('composer.sig'))) { fwrite(STDERR, 'ERROR: Invalid Composer installer signature'.PHP_EOL); exit(1); }" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php composer.sig

# Install Xdebug so it can be toggled on demand
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Ship default Xdebug configuration and helper
COPY .devcontainer/xdebug.ini /usr/local/etc/php/conf.d/99-xdebug.ini
COPY .devcontainer/scripts/xdebug-on.sh /usr/local/bin/xdebug-on
RUN chmod +x /usr/local/bin/xdebug-on

# Persist Composer cache to speed up installs between rebuilds
ENV COMPOSER_CACHE_DIR=/workspaces/.composer/cache

# Switch to non-root user
USER $USERNAME
