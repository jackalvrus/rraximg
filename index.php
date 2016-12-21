<html>
<body>

<?php

$loginMessage = 'You are not logged in properly, please register/login here: <a href="http://www.roadraceautox.com/forum.php">http://www.roadraceautox.com/forum.php</a>';
$passwordCookie = 'bb_password';
$usernameCookie = 'bb_user';

if(isset($_COOKIE[$passwordCookie])) {

    if (isset($_COOKIE[$usernameCookie])) {
        $username = $_COOKIE[$usernameCookie];

        echo '<p>All set ' . $username . '</p>';

        echo '<p><a href="/img/upload.php">You can upload MOAR images</a></p>';

        echo '<p>Let\'s show your images:</p>';

        $dir = new DirectoryIterator($username);

        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {

                $fileName = $fileinfo->getFilename();

                if (!preg_match('/-t\.|-s\.|-m\.|-l\.|\.php/', $fileName)) {

                    $justFileName =  pathinfo($fileName, PATHINFO_FILENAME);
                    $extension =  pathinfo($fileName, PATHINFO_EXTENSION);

                    echo '<a href="image.php?i=' . urlencode($username) . '/'. urlencode($fileName) . '"><div style="background: url(\'/img/' . $username . '/'. $justFileName . '-s.' . $extension . '\') 50% 50%; display: inline-block; height: 150px; width: 150px; overflow:hidden; margin: 0px 20px 20px 0;"></div></a>';
                }
            }
        }

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
