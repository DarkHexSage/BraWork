<?php

function verifyAnsibleUser() {
    if (posix_getpwnam('ansibleuser')) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyAnsibleUser();
?>

