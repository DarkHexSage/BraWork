<?php
function verifyPodExecution() {
    // Define the kubectl command to execute the pod
    $podCommand = 'kubectl exec -n zenspace4 $(kubectl get pods -n zenspace4 -l app=echobox -o jsonpath="{.items[0].metadata.name}") -- /bin/sh -c "echo ZenCorp"';

    // Execute the command and capture the output
    $output = shell_exec($podCommand);

    // Check if the output contains "ZenCorp"
    if (strpos($output, 'ZenCorp') !== false) {
        echo 'success';
    } else {
        echo 'failure';
    }
}

// Call the function to verify pod execution
verifyPodExecution();
?>
