<?php
function verifyFlaskInstalled() {
    // Execute the command to check Flask installation
    $output = shell_exec("pip list | grep Flask");

    // Check if Flask is present in the output
    if (strpos($output, 'Flask') !== false) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyFlaskInstalled();
?>

