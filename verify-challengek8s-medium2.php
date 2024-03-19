<?php



// Challenge 2 Verification Function
function verifyChallenge2() {
    // Define the deployment name, namespace, and expected image for Challenge 2
    $deploymentName = 'zenployment';
    $namespace = 'zenspace';
    $expectedImage = 'nginx:latest';

    // Execute the kubectl command to get the image of the deployment
    $command = "sudo microk8s.kubectl get deployment -n $namespace $deploymentName -o=jsonpath='{.spec.template.spec.containers[0].image}'";
    $image = shell_exec($command);

    // Check if the retrieved image matches the expected image
    if (trim($image) === $expectedImage) {
        return 'success';
    } else {
        return 'failure';
    }
}
?>

