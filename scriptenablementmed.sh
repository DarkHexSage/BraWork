#!/bin/bash

# Challenge 1: Create an immutable file
sudo touch /opt/suspiciousfile/keyTrojan
sudo chattr +i /opt/suspiciousfile/keyTrojan

##challenge2
##stress cpu and mem to deplete a bit the resources.
stress --vm-bytes $(awk '/MemAvailable/{printf "%d\n", $2 * 0.9;}' < /proc/meminfo)k --vm-keep -m 1 &


# Challenge 3
# Define the number of random numbers you want to generate
num_random_numbers=3379
# Loop to generate random numbers
for ((i=1; i<=$num_random_numbers; i++)); do
    random_number=$((RANDOM))
    echo "$random_number"
done


##challenge 4
#!/bin/bash
# Define the base content
base_content="This is some sample text. It is similar in all files."

# Generate a random number between 1 and 17
random_position=$((1 + RANDOM % 17))

# Create 17 files with similar content
for i in {1..17}; do
    if [ "$i" -eq "$random_position" ]; then
        echo "${base_content} ( ͡° ͜ʖ ͡°)" > "file$i.txt"
    else
        echo "$base_content" > "file$i.txt"
    fi
done

echo "Files created successfully."
