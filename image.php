<?php
    $target_file = htmlspecialchars($_GET['i']);

    echo '<p><a href="/img/">See all your images</a></p>';

    include 'showImage.php';
?>
