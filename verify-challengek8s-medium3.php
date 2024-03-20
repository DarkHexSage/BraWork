<?php

function verifyRBACExercise() {
    // Define the kubectl commands to check Role and RoleBinding
    $roleCommand = 'sudo microk8s.kubectl -n rbac-example get role pod-reader';
    $roleBindingCommand = 'sudo microk8s.kubectl -n rbac-example get rolebinding read-pods';

    // Execute the commands and capture the output
    $roleOutput = shell_exec($roleCommand);
    $roleBindingOutput = shell_exec($roleBindingCommand);

    // Check if both Role and RoleBinding exist
    if (!empty($roleOutput) && !empty($roleBindingOutput)) {
        echo 'success';
    } else {
        echo 'failure';
    }
}

// Call the function to verify RBAC exercise completion
verifyRBACExercise();

