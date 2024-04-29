<?php

function verifyAnsibleDir() {
    if (is_dir('/challenge/ansible_dir')) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyAnsibleDir();
?>

