<?php

function verifyHelloTxt() {
    if (file_exists('/challenge/hello.txt') && trim(file_get_contents('/challenge/hello.txt')) === 'Hello, Ansible') {
        return 'success';
    } else {
        return 'failure';
    }
}

// Example usage:
echo verifyHelloTxt();
?>

