<?php
function verifyFileOwnershipAndChecksum() {
    // Define the file path
    $filePath = '/challenge/darkuser.txt';

    // Define the expected checksum
    $expectedChecksum = '0dcd3e8d3dd11021c3a82380cdee5824';

    // Check if the file exists
    if (file_exists($filePath)) {
        // Get the file owner user and group
        $fileOwner = posix_getpwuid(fileowner($filePath));
        $fileGroup = posix_getgrgid(filegroup($filePath));

        // Check if the file owner is "darkcandidate" and the group is "darkcandidate"
        if ($fileOwner['name'] === 'darkcandidate' && $fileGroup['name'] === 'darkcandidate') {
            // Calculate the MD5 checksum of the file
            $actualChecksum = md5_file($filePath);

            // Compare the actual checksum with the expected checksum
            if ($actualChecksum === $expectedChecksum) {
                echo 'success';
            } else {
                echo 'failure';
            }
        } else {
            echo 'failure'; // File owner or group is not "darkcandidate"
        }
    } else {
        echo 'failure'; // File not found
    }
}

// Call the function
verifyFileOwnershipAndChecksum();
?>
