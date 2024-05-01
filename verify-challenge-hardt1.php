


<?php
// Define the file path
$filePath = '/challenge/fixtale.txt';

// Define the expected checksum
$expectedChecksum = '2e3f5e4914e5819ea57d083433d8d471';

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


