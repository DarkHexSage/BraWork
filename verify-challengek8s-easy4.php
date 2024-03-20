<?php
function verifyPodExecution() {
    // Define the kubectl command to check the pod status and retrieve its logs
    $kubectlCommand = 'kubectl -n zenspace4 get pods -l app=echobox -o jsonpath="{.items[*].status.containerStatuses[*].state.running}"';

    // Execute the command and capture the output
    $podStatus = shell_exec($kubectlCommand);

    // Check if the pod is running
    if (strpos($podStatus, 'true') !== false) {
        // Pod is running, now retrieve its logs
        $logsCommand = 'kubectl -n zenspace4 logs $(kubectl -n zenspace4 get pods -l app=echobox -o jsonpath="{.items[0].metadata.name}")';

        // Execute the command and capture the output
        $logsOutput = shell_exec($logsCommand);

        // Check if the output contains "ZenCorp"
        if (strpos($logsOutput, 'ZenCorp') !== false) {
            echo 'success';
        } else {
            echo 'failure';
        }
    } else {
        echo 'failure';
    }
}

// Call the function to verify pod execution
verifyPodExecution();
?>
