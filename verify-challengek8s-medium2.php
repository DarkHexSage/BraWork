<?php

function verifyDeploymentRunningNginx($deploymentName, $namespace, $expectedImage) {
    // Define the kubectl command to describe the deployment
    $describeCommand = "sudo /snap/bin/microk8s.kubectl -n $namespace describe deployment $deploymentName";

    // Execute the command and capture the output
    $describeOutput = shell_exec($describeCommand);

    // Check if the output contains the expected image
    if (strpos($describeOutput, $expectedImage) !== false) {
        echo 'success';
    } else {
        echo 'failure';
    }
}

// Specify deployment details
$deploymentName = 'zenployment';
$namespace = 'zenspace';
$expectedImage = 'nginx:latest';

// Call the function to verify deployment
verifyDeploymentRunningNginx($deploymentName, $namespace, $expectedImage);
?>
