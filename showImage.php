<?php

    if (!file_exists($target_file)) {
        echo '<p>Yore file is not here. <a href="/img/">See all your images</p>';
    } else {
        $directory = pathinfo($target_file, PATHINFO_DIRNAME);
        $filename =  pathinfo($target_file, PATHINFO_FILENAME);
        $extension =  pathinfo($target_file, PATHINFO_EXTENSION);

        echo '<div style="clear:both; margin-bottom: 20px;"></div>';

        echo '<div style="float: left; width: 60%; padding-right: 2%; max-width: 640px;">';
            echo '<img style="width: 100%; height: auto; max-width: 640px;" src="' . $directory . '/' . $filename . '-m.' . $extension . '">';
        echo '</div>';

        echo '<div style="float: left; width: 38%;">';
            echo '<div style="font-weight: bold;">Small (~200px)</div>';
            echo '<div>-Direct Image: <a href="http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-s.' . $extension . '">http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-s.' . $extension . '</a></div>';
            echo '<div>-Forum Embed: [img]http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-s.' . $extension . '[/img]</div>';

            echo '<p style="font-weight: bold;">Medium (~600px)</p>';
            echo '<div>-Direct Image: <a href="http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-m.' . $extension . '">http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-m.' . $extension . '</a></div>';
            echo '<div>-Forum Embed: [img]http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-m.' . $extension . '[/img]</div>';

            echo '<p style="font-weight: bold;">Large (~1200px)</p>';
            echo '<div>-Direct Image: <a href="http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-l.' . $extension . '">http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-l.' . $extension . '</a></div>';
            echo '<div>-Forum Embed: [img]http://www.roadraceautox.com/img/' . $directory . '/' . $filename . '-l.' . $extension . '[/img]</div>';

            echo '<p style="font-weight: bold;">Original (~2000px)</p>';
            echo '<div>-Direct Image: <a href="http://www.roadraceautox.com/img/' . $target_file . '">http://www.roadraceautox.com/img/' . $target_file . '</a></div>';
            echo '<div>-Forum Embed: [img]http://www.roadraceautox.com/img/' . $target_file . '[/img]</div>';
        echo '</div>';
    }

?>
