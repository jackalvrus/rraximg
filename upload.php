<html>
<body>

<?php

$loginMessage = 'You are not logged in properly, please register/login here: <a href="http://www.roadraceautox.com/forum.php">http://www.roadraceautox.com/forum.php</a>';
$passwordCookie = 'bb_password';
$usernameCookie = 'bb_user';

if(isset($_COOKIE[$passwordCookie])) {


    if (isset($_COOKIE[$usernameCookie])) {
        $username = $_COOKIE[$usernameCookie];

        echo '<p>All set ' . $username . ', let\'s upload images</p>';

        ?>

        <form action="/img/process.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" accept="image/*" name="filesToUpload[]" id="filesToUpload" multiple="multiple">
            <input type="submit" name="submit" value="Upload">
        </form>

        <?php
    }
    else {
        echo $loginMessage;
    }
} else {
    echo $loginMessage;
}

?>

</body>
</html>
