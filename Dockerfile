FROM php:8.1.32-apache

# Ativa mod_rewrite para URLs amigáveis
RUN a2enmod rewrite

# Instala as extensões do PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Copia o binário do composer para o container
COPY --from=composer:2.8.9 /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos de dependência primeiro para otimizar cache do docker
COPY composer.json composer.lock ./

# Instala as dependências do composer
RUN composer install --no-interaction --optimize-autoloader

# Copia o restante do código (src, public, etc)
COPY . .

# Ajusta permissões (opcional, mas evita problemas de acesso)
RUN chown -R www-data:www-data /var/www/html
