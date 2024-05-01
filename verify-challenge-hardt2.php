


<?php
// Define the file path
$filePath = '/challenge/darkuser.txt';

// Define the expected checksum
$expectedChecksum = '0dcd3e8d3dd11021c3a82380cdee5824';

// Check if the file exists
if (file_exists($filePath)) {
    // Calculate the MD5 checksum of the file
    $actualChecksum = md5_file($filePath);

    // Compare the actual checksum with the expected checksum
    if ($actualChecksum === $expectedChecksum) {
        echo 'success';
    } else {
        echo 'failure';
    }
} else {
    echo 'failure'; // File not found
}
?>
