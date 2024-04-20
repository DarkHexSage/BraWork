<?php
function verifyGroupExistence() {
    // Read the contents of the /etc/group file
    $groupFileContent = file_get_contents('/etc/group');

    // Check if the 'webadmins' group exists in the file
    if (strpos($groupFileContent, 'webadmins:') !== false) {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyGroupExistence();
?>

