<?php

function verifyConfigModified() {
    $output = shell_exec("grep 'Setting=Value' /challenge/config.txt 2>&1");
    if (!empty($output)) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyConfigModified();

?>

