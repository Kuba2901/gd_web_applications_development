<?php
function showGallery() {
    $dirname = "thumbnails/";
    $images = glob($dirname."*");

    foreach($images as $image) {
        $initialString = substr($image, 3);
        $fileName = substr($initialString, strpos($initialString, "/") + 1);
        $bigPicture = "small/$fileName";
        echo '<a href="'.$bigPicture.'"><img src="'.$image.'" /></a>';
    }
}


?>
