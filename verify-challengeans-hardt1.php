<?php
function verifyGroupCreation() {
    $groupName = 'webadmins';
    exec("getent group $groupName", $output, $returnCode);
    if ($returnCode === 0) {
        return 'success';
    }
    return 'failure';
}

// Example usage:
echo verifyGroupCreation();
?>
