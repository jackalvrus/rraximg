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

        $count=0;

        header('Content-Type: application/json');
        $response = '{"files": [';

        foreach ($_FILES['files']['name'] as $target_file) {
            $response = $response . '{';

            $target_file = basename($target_file);

            $uploadOk = 1;

            $imageFileName = pathinfo($target_file, PATHINFO_FILENAME);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $file = $_FILES['files']["tmp_name"][$count];

            $response = $response . '"name" : "' . $imageFileName . '.' . $imageFileType . '"';
            $response = $response . ',"size" : "' . filesize($file) . '"';

            $target_file = $target_dir . $imageFileName . '.' . $imageFileType;

            // Check if file already exists
            if (file_exists($target_file)) {
                $response = $response . ',"error" : "Sorry, file already exists."';
                $uploadOk = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $response = $response . ',"error" : "Sorry, only jpg, jpeg, png & gif files are allowed."';
                $uploadOk = 0;
            }

            if ($uploadOk) {
                $filename =  pathinfo($target_file, PATHINFO_FILENAME);
                $extension =  pathinfo($target_file, PATHINFO_EXTENSION);

                $image = new ImageResize($file);

                $image->resizeToBestFit(2048, 1536);
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

                $response = $response . ',"url": "' . $target_file . '"';
                $response = $response . ',"thumbnailUrl": "' . $target_dir . $filename . '-s.' . $extension . '"';
                $response = $response . ',"type": "image/' . $extension . '"';
                $response = $response . ',"deleteUrl": "' . $target_file . '"';
                $response = $response . ',"deleteType": "DELETE"';
            }

            $count=$count + 1;
            $response = $response . '}';
        }

        $response = $response . ']}';

        echo $response;

        // echo '<div style="clear:both;"></div>';
        // echo "<p><a href=\"/img/index.php\">See all your images</a></p>";
        // echo "<p><a href=\"/img/upload.php\">or upload MOAR</a></p>";

    }
    else {
        // echo $loginMessage;
    }
?>
