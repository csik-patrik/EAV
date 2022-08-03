FROM php:8.1.7-fpm-alpine

RUN docker-php-ext-install pdo_mysql