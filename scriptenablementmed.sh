#!/bin/bash



# Get the current value of $DOCKER_HOST_IP
DOCKER_HOST_IP=$(hostname -I | cut -d ' ' -f 1)

# Replace occurrences of the IP address with $DOCKER_HOST_IP
sed -i "s/131.186.0.96/${DOCKER_HOST_IP}/g" /var/www/html/medium-test.php

#chal
mkdir -p /challenge/four
# a
# Challenge 1: Create an immutable file
mkdir -p /opt/suspiciousfile/
touch /opt/suspiciousfile/keyTrojan
chattr +i /opt/suspiciousfile/keyTrojan

##challenge2
##stress cpu and mem to deplete a bit the resources.
stress --vm-bytes $(awk '/MemAvailable/{printf "%d\n", $2 * 0.9;}' < /proc/meminfo)k --vm-keep -m 1 &


# Challenge 3
# Define the number of random numbers you want to generate
num_random_numbers=3379
# Loop to generate random numbers
for ((i=1; i<=$num_random_numbers; i++)); do
    random_number=$((RANDOM))
    echo "$random_number" >> /challenge/random.txt
done


##challenge 4


# Directory where files will be created
directory="/challenge/four/"

# Create directory if it doesn't exist
mkdir -p "$directory"

# Loop to create 30 files
for ((i=1; i<=30; i++))
do
    # Determine content based on even or odd index
    if ((i % 2 == 0)); then
        content="Praise the moon"
    else
        content="Praise the sun"
    fi

    # Create the file with the determined content
    echo "$content" > "${directory}file$i.txt"
done


wget -O /challenge/random.txt https://raw.githubusercontent.com/DarkHexSage/BraWork/main/random.txt
chmod 4777 /challenge/
chown -R candidate:candidate /challenge/
