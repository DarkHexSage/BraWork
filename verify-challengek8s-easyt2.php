<?php

function verifyMultiContainerPod() {
    $output = shell_exec('sudo /snap/bin/microk8s.kubectl get pods -n zenspace3 multipod -o json');
    $podInfo = json_decode($output, true);

    if ($podInfo && isset($podInfo['metadata']) && isset($podInfo['spec']) &&
        isset($podInfo['spec']['containers']) && count($podInfo['spec']['containers']) === 2) {
        // Pod exists and has two containers
        $containerNames = [];
        $containerImages = [];
        
        // Extract container names and images
        foreach ($podInfo['spec']['containers'] as $container) {
            $containerNames[] = $container['name'];
            $containerImages[] = $container['image'];
        }
        
        // Check if both nginx and alpine containers exist
        if (in_array('nginx-container', $containerNames) && in_array('alpine-container', $containerNames)) {
            // Check if both nginx and alpine images exist
            if (in_array('nginx', $containerImages) && in_array('alpine', $containerImages)) {
                return "success";
            }
        }
    }
    return "failure";
}

// Usage example
echo verifyMultiContainerPod();
?>
