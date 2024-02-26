
<?php
// Define the file path and expected MD5 checksum
$filePath = '/challenge/filediff.txt';
$expectedMD5 = 'd5809377973bb71fb90ad5de3fdb4824';

// Calculate the MD5 checksum of the file
$fileMD5 = md5_file($filePath);

// Compare the calculated MD5 checksum with the expected MD5 checksum
if ($fileMD5 === $expectedMD5) {
    echo "success";
} else {
    echo "failure";
}
?>
