#!/bin/bash

# Set the temporary directory path
TEMP_DIR="/tmp/ansible-tmp"

# Create the temporary directory
mkdir -p "$TEMP_DIR"

# Check if the directory was created successfully
if [ $? -eq 0 ]; then
    echo "Temporary directory created successfully: $TEMP_DIR"
else
    echo "Failed to create temporary directory: $TEMP_DIR"
    exit 1
fi

# Set appropriate permissions for the temporary directory
chmod 1777 "$TEMP_DIR"

# Verify permissions
DIR_PERMISSIONS=$(stat -c "%a" "$TEMP_DIR")
if [ "$DIR_PERMISSIONS" == "1777" ]; then
    echo "Permissions set successfully for: $TEMP_DIR"
else
    echo "Failed to set permissions for: $TEMP_DIR"
    exit 1
fi
