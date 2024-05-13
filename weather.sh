#!/bin/bash
# Define the trigger file path
a="/c"
b="hal"
c="lenge/fi"
d="x"

# Check if the trigger file exists
if [ -f "$a$b$c$d" ]; then
    # Print weather description if trigger file exists
    echo "Today's weather is sunny and warm. Enjoy the sunshine!"
    exit 0
else
    # Print message if trigger file doesn't exist
    echo "No weather information available."
    exit 1
fi
