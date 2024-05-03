<?php

function verifynginxRestart() {
    // Get the process ID (PID) of the Redis service before the operation
    $initialPID = trim(shell_exec("pgrep cron"));

    // Execute command to restart the Redis service
    shell_exec("sudo service cron restart");

    // Get the process ID (PID) of the Redis service after the operation
    $finalPID = trim(shell_exec("pgrep cron"));

    // Check if the process IDs are different to confirm restart
    if ($initialPID !== $finalPID) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifynginxRestart();

?>
