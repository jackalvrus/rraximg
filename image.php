<?php
    $target_file = htmlspecialchars($_GET['i']);

    if (!file_exists($target_file)) {
        echo '<p>Yore file is not here. <a href="/img/">See all your images</p>';
    } else {
        $directory = pathinfo($target_file, PATHINFO_DIRNAME);
        $filename =  pathinfo($target_file, PATHINFO_FILENAME);
        $extension =  pathinfo($target_file, PATHINFO_EXTENSION);

        echo '<p><a href="/img/">See all your images</a></p>';

        echo '<p><img src="' . $directory . '/' . $filename . '-m.' . $extension . '"></p>';

        echo '<div style="font-weight: bold;">Small (~200px)</div>';
        echo '<div>-Direct Image: <a href="http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-s.' . $extension . '">http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-s.' . $extension . '</a></div>';
        echo '<div>-Forum Embed: [img]http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-s.' . $extension . '[/img]</div>';

        echo '<p style="font-weight: bold;">Medium (~640px)</p>';
        echo '<div>-Direct Image: <a href="http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-m.' . $extension . '">http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-m.' . $extension . '</a></div>';
        echo '<div>-Forum Embed: [img]http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-m.' . $extension . '[/img]</div>';

        echo '<p style="font-weight: bold;">Large (~1280px)</p>';
        echo '<div>-Direct Image: <a href="http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-l.' . $extension . '">http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-l.' . $extension . '</a></div>';
        echo '<div>-Forum Embed: [img]http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-l.' . $extension . '[/img]</div>';

        echo '<p style="font-weight: bold;">Original Size</p>';
        echo '<div>-Direct Image: <a href="http://www.roadraceautox.com/img/' . $target_file . '">http://www.roadraceautox.com/img/' . $target_file . '</a></div>';
        echo '<div>-Forum Embed: [img]http://www.roadraceautox.com/img/' . $target_file . '[/img]</div>';
    }
?>
