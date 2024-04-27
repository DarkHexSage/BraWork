#!/bin/bash
# Define the path to the trigger file
trigger_file="/challenge/fix"

# Check if the trigger file exists
if [ -f "$trigger_file" ]; then
    # If the trigger file exists, print out the weather description
    echo "Today's weather is sunny and warm. Enjoy the sunshine!"
    exit 0  # Exit with code 0 for success
else
    # If the trigger file doesn't exist, print a message indicating no weather information
    echo "No weather information available."
    exit 1  # Exit with code 1 for no weather information
fi
