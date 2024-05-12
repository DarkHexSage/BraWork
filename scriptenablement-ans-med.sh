#!/bin/bash
chown -R www-data:www-data /challenge/
chown -R www-data:www-data /business/
chmod 700 /challenge/
chmod 700 /business/
# Get the current value of $DOCKER_HOST_IP
DOCKER_HOST_IP=$(curl ipinfo.io/ip)
# Replace occurrences of the IP address with $DOCKER_HOST_IP
sed -i "s/131.186.0.96/${DOCKER_HOST_IP}/g" /var/www/html/medium-ans-test.php
