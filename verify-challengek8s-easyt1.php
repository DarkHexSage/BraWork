<?php

function verifyPodExecution() {
    // Define the pod name
    $podName = "echobox";

    // Define the kubectl command to retrieve pod logs
    $logsCommand = "sudo /snap/bin/microk8s.kubectl -n zenspace4 logs $podName";

    // Execute the command and capture the output
    $logsOutput = shell_exec($logsCommand);

    // Check if the output contains "ZenCorp"
    if (strpos($logsOutput, 'ZenCorp') !== false) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Call the function to verify pod execution and echo the result
echo verifyPodExecution();
?>
