<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php
        include 'common/head.php';
    ?>
</head>
<body>

    <?php
    include 'common/header.php';
    
    include 'common/loggedIn.php';
    ?>

    <div class="images container">
        <div class="imageList clearfix">
            <?php
            if($username) {

                $dir = new DirectoryIterator($username);

                foreach ($dir as $fileinfo) {
                    if (!$fileinfo->isDot()) {

                        $fileName = $fileinfo->getFilename();

                        // maks sure it's not one of our sized images or a php file. If that's the case, it means it's an image
                        // as there is no other way to get a file in here
                        if (!preg_match('/-t\.|-s\.|-m\.|-l\.|\.php/', $fileName)) {

                            $justFileName =  pathinfo($fileName, PATHINFO_FILENAME);
                            $extension =  pathinfo($fileName, PATHINFO_EXTENSION);

                            echo '<div class="imageListItem"><a class="imageLink" href="image.php?i=' . urlencode($username) . '/'. urlencode($fileName) . '"><div class="imageBlock" style="background-image: url(\'/img/' . $username . '/'. $justFileName . '-s.' . $extension . '\');"></div></a></div>';
                        }
                    }
                }

            } else {
                echo $loginMessage;
            }
            ?>
        </div>
    </div>
</body>
</html>
