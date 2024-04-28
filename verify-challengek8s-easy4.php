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
        echo 'success';
    } else {
        echo 'failure';
    }
}

// Call the function to verify pod execution
verifyPodExecution();
?>
