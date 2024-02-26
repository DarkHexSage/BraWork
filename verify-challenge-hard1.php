<?php
// Execute the shell command to check if the file /tmp/fix exists
$result = shell_exec('if [ -f "/challenge/fix" ]; then echo "success"; else echo "failure"; fi');

// Output the result
echo $result;
?>
