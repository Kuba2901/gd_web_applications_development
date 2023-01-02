<?php

include 'db_connect.php';

session_start();

// Write text to image
function addWatermark($fileName, $watermark) {

  // Get image format
  $imageFormat = substr($fileName, strpos($fileName, ".") + 1);

  if ($imageFormat == "jpg" || $imageFormat == "jpeg") {
    // Create Image From Existing File
    $jpg_image = imagecreatefromjpeg("images/".$fileName);

    // Allocate A Color For The Text
    $white = imagecolorallocate($jpg_image, 255, 255, 255);

    // Set Path to Font File
    $font_path = './better-yesterday.ttf';

    // Set Text to Be Printed On Image
    $text = $watermark;

    // Resize image
    $jpegImageResized = imagescale(
      $jpg_image,
      200,
      125
    );

    // Print Text On Image
    imagettftext($jpg_image, 40, 0, 75, 100, $white, $font_path, $text);

    // Send Image to Browser
    imagejpeg($jpg_image, "small/".$fileName);
    imagejpeg($jpegImageResized, "thumbnails/".$fileName);
    

    // Clear Memory
    imagedestroy($jpg_image);
  } else {
    // Create Image From Existing File
    $png_image = imagecreatefrompng("images/".$fileName);

    // Allocate A Color For The Text
    $white = imagecolorallocate($png_image, 255, 255, 255);

    // Set Path to Font File
    $font_path = './better-yesterday.ttf';

    // Set Text to Be Printed On Image
    $text = $watermark;

    // Resize image
    $pngImageResized = imagescale(
      $png_image,
      200,
      125
    );

    // Print Text On Image
    imagettftext($png_image, 40, 0, 75, 100, $white, $font_path, $text);

    // Send Image to Browser
    imagejpeg($png_image, "small/".$fileName);
    imagejpeg($pngImageResized, "thumbnails/".$fileName);


    // Clear Memory
    imagedestroy($png_image);
  }

  header("Location: upload_image.php");  

  
}

/* Get the name of the file uploaded to Apache */
$filename = $_FILES['file']['name'];
$watermarkValue = $_POST['watermark'];
$titleValue = $_POST['title'];
$authorValue = $_POST['author'] ?? $_SESSION["userLogin"];
$visibility = $_POST['visibility'];


/* Prepare to save the file upload to the upload folder */
$location = "images/".$filename;

/* Permanently save the file upload to the upload folder */
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) {
  addWatermark($filename, $watermarkValue);
  uploadImageDataToDB($titleValue, $authorValue, $watermarkValue, $filename, $visibility);
} else { 
  echo '<p>The php and HTML5 file upload failed.</p>'; 
}

// Upload to the database
function uploadImageDataToDB($title, $author, $watermark, $fileName, $visibility) {
  $db = GetDatabase::get_db();

  $image = [
    'title' => $title,
    'author' => $author,
    'watermark' => $watermark,
    'fileName' => $fileName,
    'visibility' => $visibility,
  ];

  $db->images->insertOne($image);
}

?>
