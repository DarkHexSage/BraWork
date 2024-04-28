<?php

function verifyServiceAccount() {
    // Check if ServiceAccount exists
    $output = shell_exec("sudo /snap/bin/microk8s.kubectl get sa app-sa --no-headers=true");
    if (strpos($output, 'app-sa') !== false) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyServiceAccount();
?>

