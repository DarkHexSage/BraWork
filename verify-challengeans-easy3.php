<?php

function verifyRedisRestart() {
    // Get timestamp of Redis service restart before the operation
    $initialTimestamp = shell_exec("systemctl show -p ActiveEnterTimestamp redis | awk -F '=' '{print $2}' 2>&1");

    // Execute command to restart Redis service
    shell_exec("sudo systemctl restart redis");

    // Get timestamp of Redis service restart after the operation
    $finalTimestamp = shell_exec("systemctl show -p ActiveEnterTimestamp redis | awk -F '=' '{print $2}' 2>&1");

    // Check if timestamps are different to confirm restart
    if (trim($initialTimestamp) !== trim($finalTimestamp)) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyRedisRestart();

?>

