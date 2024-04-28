<?php

function verifyResourceLimitation() {
    // Check if Deployment exists
    $output = shell_exec("sudo /snap/bin/microk8s.kubectl get deployment resource-app --no-headers=true");
    if (strpos($output, 'resource-app') !== false) {
        // Check if all replicas are running
        $replicas = shell_exec("sudo /snap/bin/microk8s.kubectl get deployment resource-app -o=jsonpath='{.status.readyReplicas}'");
        if ($replicas == "3") {
            return 'success';
        }
    }
    return 'failure';
}

// Example usage:
echo verifyResourceLimitation();
?>

