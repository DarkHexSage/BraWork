<?php
// Define the deployment name and namespace
$deploymentName = "zenployment";
$namespace = "zenspace";

// Execute the kubectl command to get the deployment replicas
$command = "sudo microk8s.kubectl get deployment $deploymentName -n $namespace -o=jsonpath='{.spec.replicas}'";
$output = shell_exec($command);

// Check if the output contains a valid number
if (is_numeric(trim($output))) {
    // Check if the number of replicas is 21
    if (intval(trim($output)) === 21) {
        echo 'success';
    } else {
        echo 'failure';
    }
} else {
    // Return failure if the command failed or returned invalid output
    echo 'failure';
}
?>

