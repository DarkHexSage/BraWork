<?php
function verifyChecksums() {
    $filePaths = array(
        '/challenge/creds1.txt',
        '/challenge/creds2.txt',
        '/challenge/creds3.txt'
    );

    $expectedChecksums = array(
        '/challenge/creds1.txt' => 'dcbaf09810e9fad42029d46f69b69871',
        '/challenge/creds2.txt' => '501eb8793b20609da2eb31481a75babc',
        '/challenge/creds3.txt' => 'ef97fdd03c0f756558add1e5092088d1'
    );

    foreach ($filePaths as $filePath) {
        // Check if file exists
        if (file_exists($filePath)) {
            // Calculate MD5 checksum of the file
            $actualChecksum = md5_file($filePath);

            // Compare with expected checksum
            if (isset($expectedChecksums[$filePath]) && $actualChecksum === $expectedChecksums[$filePath]) {
                continue; // Checksum matched, continue to the next file
            } else {
                return 'failure'; // Checksum mismatch, return failure immediately
            }
        } else {
            return 'failure'; // File not found, return failure immediately
        }
    }

    return 'success'; // All checksums matched, return success
}

// Example usage:
$verificationResult = verifyChecksums();
echo $verificationResult;
?>
