<?php
// Define the file path where flag1 is stored
$filePath = '/challenge/pods.txt';

// Compute the MD5 checksum of flag1
$md5Checksum = trim(shell_exec("md5sum $filePath | cut -d ' ' -f1"));

// Compare the computed MD5 checksum with the expected value
if ($md5Checksum === 'cf5aa7c81b09cb129df176d3ecd1f551') { // Adjust with the correct MD5 checksum
    echo 'success';
} else {
    echo 'failure';
}
?>

