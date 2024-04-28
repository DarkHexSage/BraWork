<?php

function verifyDeploymentReplicas() {
    // Define the deployment name and namespace
    $deploymentName = "zenployment";
    $namespace = "zenspace";

    // Execute the kubectl command to get the deployment replicas
    $command = "sudo /snap/bin/microk8s.kubectl get deployment $deploymentName -n $namespace -o=jsonpath='{.spec.replicas}'";
    $output = shell_exec($command);

    // Check if the output contains a valid number
    if (is_numeric(trim($output))) {
        // Check if the number of replicas is 21
        if (intval(trim($output)) === 21) {
            return 'success';
        } else {
            return 'failure';
        }
    } else {
        // Return failure if the command failed or returned invalid output
        return 'failure';
    }
}

// Call the function to verify the deployment replicas and echo the result
echo verifyDeploymentReplicas();
?>


