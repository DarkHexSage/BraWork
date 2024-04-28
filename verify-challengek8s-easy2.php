<?php
function verifyFlag1Checksum() {
    // Define the file path where flag1 is stored
    $filePath = '/challenge/creds.txt';

    // Compute the MD5 checksum of flag1
    $md5Checksum = trim(shell_exec("md5sum $filePath | cut -d ' ' -f1"));

    // Compare the computed MD5 checksum with the expected value
    if ($md5Checksum === 'd6fed0c928e793294aa68ef9a3120fe2') { // Adjust with the correct MD5 checksum
        echo 'success';
    } else {
        echo 'failure';
    }
}

// Call the function to verify the flag1 checksum
echo verifyFlag1Checksum();
?>
