#!/bin/bash
chmod 777 /challenge/
# Get the current value of $DOCKER_HOST_IP
DOCKER_HOST_IP=$(curl ipinfo.io/ip)
# Replace occurrences of the IP address with $DOCKER_HOST_IP
sed -i "s/131.186.0.96/${DOCKER_HOST_IP}/g" /var/www/html/hard-ans-test.php
echo "America/New_York" > /etc/timezone
