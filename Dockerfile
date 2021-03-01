FROM php:8-apache
COPY . /var/www/html/
COPY php.ini $PHP_INI_DIR/conf.d/
RUN rm /var/www/html/php.ini
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R +rw /var/www/html/config
EXPOSE 80