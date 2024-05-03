<?php

function verifyTimezoneSetToUTC() {
    $output = exec("sudo cat /etc/timezone");
    
    if (strpos($output, 'Asia/Tokyo') !== false) {
        return 'success';
    } else {
        return 'failure';
    }
}
echo verifyTimezoneSetToUTC();

?>

