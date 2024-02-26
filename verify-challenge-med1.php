<?php
// Challenge 1: Check if the suspicious file exists
$suspiciousFilePath = '/opt/suspiciousfile/keyTrojan';

if (file_exists($suspiciousFilePath)) {
    echo 'failure';
} else {
    echo 'success';
}

?>

<?php
