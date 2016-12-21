<?php
    include 'resize.php';
    use \Eventviva\ImageResize;

    $loginMessage = 'You are not logged in properly, please register/login here: <a href="http://www.roadraceautox.com/forum.php">http://www.roadraceautox.com/forum.php</a>';
    $usernameCookie = 'bb_user';

    if (isset($_COOKIE[$usernameCookie])) {
        $username = $_COOKIE[$usernameCookie];

        $oldmask = umask(0);
        mkdir($username, 0777, true);
        umask($oldmask);

        touch($username . '/index.php');

        $target_dir = $username . "/";
        $target_file = basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;

        $imageFileName = pathinfo($target_file, PATHINFO_FILENAME);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $target_file = $target_dir . $imageFileName . '.' . $imageFileType;

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<p>Sorry, file already exists.</p>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 7000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only jpg, jpeg, png & gif files are allowed.";
            $uploadOk = 0;
        }
        // if everything is ok, try to upload file
        } else {

                $file = $_FILES["fileToUpload"]["tmp_name"];

                $filename =  pathinfo($target_file, PATHINFO_FILENAME);
                $extension =  pathinfo($target_file, PATHINFO_EXTENSION);

                $image = new ImageResize($file);

                $image->resizeToBestFit(2560, 2048);
                $image->quality_jpg = 90;
                $image->save($target_file);

                $image->resizeToBestFit(1280, 1024);
                $image->quality_jpg = 80;
                $image->save($target_dir . $filename . '-l.' . $extension);

                $image->resizeToBestFit(640, 480);
                $image->quality_jpg = 70;
                $image->save($target_dir . $filename . '-m.' . $extension);

                $image->resizeToBestFit(200, 200);
                $image->quality_jpg = 60;
                $image->save($target_dir . $filename . '-s.' . $extension);

                header('Location: http://www.roadraceautox.com/img/image.php?i=' . urlencode($target_file));
        }

        echo "<p><a href=\"/img/index.php\">See all your images</a></p>";
        echo "<p><a href=\"/img/upload.php\">or upload MOAR</a></p>";

    }
    else {
        echo $loginMessage;
    }
?>
