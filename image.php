<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php include 'common/head.php'; ?>
</head>
<body>
    <?php include 'common/header.php'; ?>
    <div class="container">
        <div class="image">

            <?php
            $target_file = htmlspecialchars($_GET['i']);

            if (!file_exists($target_file)) {
                echo '<div class="imageError"><p><strong>WAT DID YOU DO??? Your file is not here!</strong></p><p><a href="/img/">See all your images</p></div>';
            } else {
                $directory = pathinfo($target_file, PATHINFO_DIRNAME);
                $filename =  pathinfo($target_file, PATHINFO_FILENAME);
                $extension =  pathinfo($target_file, PATHINFO_EXTENSION);

                echo '<div class="imageSingle">';
                echo '<img src="' . $directory . '/' . $filename . '-m.' . $extension . '">';
                echo '</div>';

                echo '<div class="imageLinks">';
                    echo '<div class="imageType"><strong>Small (~200px)</strong></div>';
                    echo '<div class="imageDirectLink"><strong>Direct Image:</strong> <span><a href="http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-s.' . $extension . '">http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-s.' . $extension . '</a></span></div>';
                    echo '<div class="imageEmbed"><strong>Forum Embed:</strong> <span>[img]http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-s.' . $extension . '[/img]</span></div>';

                    echo '<div class="imageType"><strong>Medium (~600px)</strong></div>';
                    echo '<div class="imageDirectLink"><strong>Direct Image:</strong> <span><a href="http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-m.' . $extension . '">http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-m.' . $extension . '</a></span></div>';
                    echo '<div class="imageEmbed"><strong>Forum Embed:</strong> <span>[img]http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-m.' . $extension . '[/img]</span></div>';

                    echo '<div class="imageType"><strong>Large (~1200px)</strong></div>';
                    echo '<div class="imageDirectLink"><strong>Direct Image:</strong> <span><a href="http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-l.' . $extension . '">http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-l.' . $extension . '</a></span></div>';
                    echo '<div class="imageEmbed"><strong>Forum Embed:</strong> <span>[img]http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-l.' . $extension . '[/img]</span></div>';

                    echo '<div class="imageType"><strong>Original (~2000px)</strong></div>';
                    echo '<div class="imageDirectLink"><strong>Direct Image:</strong> <span><a href="http://www.roadraceautox.com/img/' . $target_file . '">http://www.roadraceautox.com/img/' . $target_file . '</a></span></div>';
                    echo '<div class="imageEmbed"><strong>Forum Embed:</strong> <span>[img]http://www.roadraceautox.com/img/' . $target_file . '[/img]</span></div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

</body>
</html>
