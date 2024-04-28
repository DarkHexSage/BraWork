<?php

function verifyNetcapodCreation() {
    // Define the kubectl command to get the pod information
    $kubectlCommand = 'sudo /snap/bin/microk8s.kubectl -n netprod get pod netcapod -o json';

    // Execute the command and capture the output
    $output = shell_exec($kubectlCommand);

    // Decode the JSON output
    $podInfo = json_decode($output, true);

    // Check if the pod exists and has the correct properties
    if ($podInfo && isset($podInfo['metadata']['name']) && $podInfo['metadata']['name'] === 'netcapod' &&
        isset($podInfo['spec']['containers'][0]['image']) && $podInfo['spec']['containers'][0]['image'] === 'alpine' &&
        isset($podInfo['spec']['containers'][0]['securityContext']['capabilities']['add']) &&
        in_array('NET_ADMIN', $podInfo['spec']['containers'][0]['securityContext']['capabilities']['add'])) {
        return 'success';
    }

    return 'failure';
}

// Example usage:
echo verifyNetcapodCreation();
?>

