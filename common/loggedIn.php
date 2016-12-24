<?php
    $loginMessage = 'You are not logged in properly, please register/login here: <a href="http://www.roadraceautox.com/forum.php">http://www.roadraceautox.com/forum.php</a>';
    $passwordCookie = 'bb_password';
    $usernameCookie = 'bb_user';

    $username = false;

    if(isset($_COOKIE[$passwordCookie])) {
        if (isset($_COOKIE[$usernameCookie])) {
            $username = $_COOKIE[$usernameCookie];
        }
    }
?>
