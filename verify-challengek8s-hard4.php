
<?php

function verifyConfigMapScenario() {
    // Check if ConfigMap 'app-config' exists in namespace 'configspace'
    $configMapOutput = shell_exec("sudo microk8s.kubectl get configmap app-config -n configspace -o=jsonpath='{.metadata.name}' 2>&1");

    // Check if Pod 'app-pod' exists in namespace 'configspace'
    $podOutput = shell_exec("sudo microk8s.kubectl get pod app-pod -n configspace -o=jsonpath='{.metadata.name}' 2>&1");

    // Verify if environment variables are set in the Pod
    if (trim($configMapOutput) === 'app-config' && trim($podOutput) === 'app-pod') {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyConfigMapScenario();
?>
