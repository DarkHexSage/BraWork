#!/bin/bash


# Get the current value of $DOCKER_HOST_IP
DOCKER_HOST_IP=$(curl ipinfo.io/ip)
# Replace occurrences of the IP address with $DOCKER_HOST_IP
sed -i "s/131.186.0.96/${DOCKER_HOST_IP}/g" /var/www/html/hard-test.php

chmod 777 /challenge/
chown -R candidate:candidate /challenge/
chown -R www-data:www-data /var/www/html/
chmod 711 /var/www/html/
