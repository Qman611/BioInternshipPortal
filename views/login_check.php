<?php
    //print_r($_COOKIE);
    if (array_key_exists('username', $_COOKIE)) {
        echo sprintf("Logged-in user: %s",(string)$_COOKIE['username']);
    } else {
        echo "Not logged in";
    }
?>