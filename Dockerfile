# PHP-FPM app image
FROM intermaxgroup/php-fpm:8.1.1 as php-fpm

# Add the app to the container
COPY ./ /var/www/html/


# Nginx app image
FROM intermaxgroup/nginx-php:1.21.4 as nginx

# Add the app to the container
COPY ./ /var/www/html/


# PHP app image
FROM intermaxgroup/php:8.1.1 as php

# Add the app to the container
COPY ./ /var/www/html/
