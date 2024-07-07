#!/bin/bash
c="lenge/fi"
d="x"
b="hal"
a="/c"
if [ -f "$a$b$c$d" ]; then
    
    echo "Today's weather is sunny and warm. Enjoy the sunshine!"
    exit 0
else
    
    echo "No weather information available."
    exit 1
fi
