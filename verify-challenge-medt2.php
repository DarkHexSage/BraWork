<?php
// Define the file path where flag1 is stored
$filePath = '/challenge/filediff.txt';

// Compute the MD5 checksum of flag1
$md5Checksum = trim(shell_exec("md5sum $filePath | cut -d ' ' -f1"));

// Compare the computed MD5 checksum with the expected value
if ($md5Checksum === 'ae164b5f7ccce3493b5c1914ec05f6e1') { // Adjust with the correct MD5 checksum
    echo 'success';
} else {
    echo 'failure';
}
?>
