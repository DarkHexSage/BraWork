<?php

function verifyTimezoneSetToUTC() {
    $output = exec("sudo cat /etc/timezone");
    
    if (strpos($output, 'UTC') !== false) {
        return 'success';
    } else {
        return 'failure';
    }
}
echo verifyTimezoneSetToUTC();

?>

