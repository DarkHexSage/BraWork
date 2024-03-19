

<?php

function verifyChallenge3() {

    // Execute kubectl command to describe the user role
    $command = "kubectl describe role -n zenspace userrole";
    $output = shell_exec($command);

    // Check if the output contains the expected role definition
    if (strpos($output, 'Resource') !== false && strpos($output, 'pods') !== false && strpos($output, 'Verbs') !== false && strpos($output, 'get') !== false) {
        return 'success';
    } else {
        return 'failure';
    }
}


?>
