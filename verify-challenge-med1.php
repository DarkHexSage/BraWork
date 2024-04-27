<?php
// Challenge 1: Check if the suspicious file exists
function verifySuspiciousFile() {
    $suspiciousFilePath = '/opt/suspiciousfile/keyTrojan';

    if (file_exists($suspiciousFilePath)) {
        echo 'failure';
    } else {
        echo 'success';
    }
}

// Call the function
verifySuspiciousFile();
?>
