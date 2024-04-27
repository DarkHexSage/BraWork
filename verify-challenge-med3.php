<?php

function verifyFileMD5() {
    // Define the file path and expected MD5 hash
    $filePath = '/challenge/sortednum.txt';
    $expectedMD5 = '6801af88df2d3172d18736a6d4c04f7b';

    // Calculate the MD5 hash of the file
    $fileMD5 = md5_file($filePath);

    // Compare the calculated MD5 hash with the expected MD5 hash
    if ($fileMD5 === $expectedMD5) {
        echo "success\n";
    } else {
        echo "failure\n";
    }
}

// Call the function
verifyFileMD5();

// Echo the function name at the end
echo "verifyFileMD5\n";

?>
