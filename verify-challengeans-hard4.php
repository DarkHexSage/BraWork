<?php
function verifyHostsModified() {
    $filePath = '/etc/hosts';
    $searchString = '127.0.0.1   example.com';

    // Check if the file exists
    if (file_exists($filePath)) {
        // Read the content of the file
        $content = file_get_contents($filePath);

        // Check if the search string exists in the content
        if (strpos($content, $searchString) !== false) {
            return 'success';
        } else {
            return 'failure';
        }
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyHostsModified();
?>

