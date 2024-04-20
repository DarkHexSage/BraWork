<?php

function verifyFileMD5() {
    // Define the path to the example.txt file
    $filePath = '/challenge/flag.txt';

    // Define the expected MD5 checksum
    $expectedChecksum = '90c70bb9bbb94c0eaf1bd5502843a953';

    // Execute the command to calculate the MD5 checksum of the file
    $command = "md5sum $filePath | awk '{print $1}'";
    $output = shell_exec($command);

    // Trim whitespace from the output
    $actualChecksum = trim($output);

    // Check if the calculated checksum matches the expected checksum
    if ($actualChecksum === $expectedChecksum) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyFileMD5();

?>

