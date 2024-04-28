<?php

function verifyPVC() {
    // Check if PVC exists
    $output = shell_exec("sudo /snap/bin/microk8s.kubectl get pvc app-data-pvc --no-headers=true");
    if (strpos($output, 'app-data-pvc') !== false) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyPVC();
?>

