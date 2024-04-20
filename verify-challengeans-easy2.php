<?php

function verifyNginxInstalled() {
    $output = shell_exec("dpkg -l nginx 2>&1");
    if (strpos($output, 'ii  nginx') !== false) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyNginxInstalled();
?>

