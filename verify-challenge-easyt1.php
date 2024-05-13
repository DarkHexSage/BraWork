<?php
// Define the file path where flag1 is stored
$filePath = '/challenge/quantity.txt';

// Compute the MD5 checksum of flag1
$md5Checksum = trim(shell_exec("md5sum $filePath | cut -d ' ' -f1"));

// Compare the computed MD5 checksum with the expected value
if ($md5Checksum === '1f18348f32c9a4694f16426798937ae2') { // Adjust with the correct MD5 checksum
    echo 'success';
} else {
    echo 'failure';
}
?>

