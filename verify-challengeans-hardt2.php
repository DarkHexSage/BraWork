<?php

function verifyNumber() {
    // Path to the file
    $filePath = '/challenge/num.txt';

    // Read the contents of the file
    $content = file_get_contents($filePath);

    // Trim whitespace and convert to integer
    $number = intval(trim($content));

    // Check if the number is 17
    if ($number === 17) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyNumber();
?>
