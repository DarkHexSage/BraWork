<?php

function verifyMultiContainerPod() {
    $output = shell_exec('sudo /snap/bin/microk8s.kubectl get pods -n zenspace3 multipod -o json');
    $podInfo = json_decode($output, true);

    if ($podInfo && isset($podInfo['metadata']) && isset($podInfo['spec']) &&
        isset($podInfo['spec']['containers']) && count($podInfo['spec']['containers']) === 2) {
        // Pod exists and has two containers
        $nginxFound = false;
        $alpineFound = false;
        foreach ($podInfo['spec']['containers'] as $container) {
            if ($container['name'] === 'nginx-container' && $container['image'] === 'nginx') {
                // Nginx container found
                $nginxFound = true;
            }
            if ($container['name'] === 'alpine-container' && $container['image'] === 'alpine') {
                // Alpine Linux container found
                $alpineFound = true;
            }
        }
        if ($nginxFound && $alpineFound) {
            return "success";
        }
    }
    return "failure";
}

// Usage example
echo verifyMultiContainerPod();
?>
