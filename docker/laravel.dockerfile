FROM php:latest
COPY ./server /var/www
WORKDIR /var/www
RUN docker-php-ext-install pdo_mysql
CMD ["php","artisan","serve","--host","0.0.0.0"]
EXPOSE 8000