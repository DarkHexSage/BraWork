<?php
function verifySampleTxt() {
    $filePath = '/challenge/sample.txt';

    // Check if the file exists
    if (file_exists($filePath)) {
        // Check if the file is not a directory
        if (!is_dir($filePath)) {
            return 'success';
        } else {
            return 'failure';
        }
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifySampleTxt();
?>

