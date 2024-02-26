<?php

function checkStressProcess() {
    // Execute the shell command to check if the stress process is running
    $processRunning = shell_exec("pgrep stress");

    // Check if shell_exec encountered an error
    if ($processRunning === false) {
        return 'error'; // Return 'error' if shell_exec failed
    }

    // Trim whitespace from the output
    $processRunning = trim($processRunning);

    // Check if the process is not running
    if (empty($processRunning)) {
        return 'success'; // Return 'success' if the process is not running
    } else {
        return 'failure'; // Return 'failure' if the process is running
    }
}

// Example usage:
$result = checkStressProcess();
echo $result;

?>
