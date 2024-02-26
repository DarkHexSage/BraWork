<?php
// Define the file path and expected MD5 hash
$filePath = '/challenge/sortednum.txt';
$expectedMD5 = '031237c28784bb6594e9e5f9da4efe90';

// Calculate the MD5 hash of the file
$fileMD5 = md5_file($filePath);

// Compare the calculated MD5 hash with the expected MD5 hash
if ($fileMD5 === $expectedMD5) {
    echo "success";
} else {
    echo "failure";
}
