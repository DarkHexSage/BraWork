<?php

function verifyServiceAccount() {
    // Check if the ServiceAccount exists
    $saOutput = shell_exec("sudo /snap/bin/microk8s.kubectl get sa app-sa --no-headers=true");
    if (strpos($saOutput, 'app-sa') === false) {
        return 'failure'; // ServiceAccount not found
    }
    
    // Check if the pod "app-pod" exists and is using the ServiceAccount "app-sa"
    $podOutput = shell_exec("sudo /snap/bin/microk8s.kubectl get pod app-pod --no-headers=true -o custom-columns=:spec.serviceAccount");
    if (strpos($podOutput, 'app-sa') !== false) {
        return 'success'; // Pod "app-pod" is using the ServiceAccount "app-sa"
    } else {
        return 'failure'; // Pod "app-pod" not found or not using the correct ServiceAccount
    }
}

// Example usage:
echo verifyServiceAccount();
?>
