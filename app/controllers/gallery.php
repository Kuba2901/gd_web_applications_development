<?php 

class Gallery extends Controller {
    
    public function index() {

        $this->view('gallery');
    }

    public static function autofillAuthor() {
        if (isset($_SESSION["userLogin"])) {
            echo '
                <input
                type="text"
                name="author"
                id="author"
                class="formbold-form-input"
                value="'.$_SESSION['userLogin'].'"
                disabled
                required
                />
            ';
        } else {
            echo '
                <input
                type="text"
                name="author"
                id="author"
                class="formbold-form-input"
                required
                />
            ';
        }
    }

    public static function showPublicPrivate() {
        if (isset($_SESSION["userLogin"])) {
            echo '
                <br>
                <br>
                <h3 class="formbold-form-label">Wybierz rodzaj</h3>
                <input type="radio" id="public" name="visibility" value="public" checked>
                <label for="html" style="color: #f2f2f2;">Publiczne</label>
                <br>
                <input type="radio" id="private" name="visibility" value="private">
                <label for="css" style="color: #f2f2f2;">Prywatne</label>
            ';
        } else {
            echo '
                <div style="display: none;">
                    <br>
                    <br>
                    <h3 class="formbold-form-label">Wybierz rodzaj</h3>
                    <input type="radio" id="public" name="visibility" value="public" checked>
                    <label for="html" style="color: #f2f2f2;">Publiczne</label>
                    <br>
                    <input type="radio" id="private" name="visibility" value="private">
                    <label for="css" style="color: #f2f2f2;">Prywatne</label>
                </div>
            ';
        }
    }
    
    function showImages() {
        require_once '../app/core/DB.php';
    
        $db = GetDatabase::get_db();
        $query = array("visibility" => [
            '$ne' => "private"
        ]);
    
        if (isset($_SESSION["userLogin"])) {
            $userLogin = $_SESSION["userLogin"];
    
            $query = [
                '$or' => [
                    ["author" => $userLogin],
                    ["visibility" => [
                        '$ne' => "private"
                    ]],
                ]
            ];
        }
    
        $images = $db->images->find($query);
    
        echo '<form action="gallery/saveChecked" method="get">';
    
        echo '<table style="width: 60%; margin-left: auto; margin-right: auto; color: #f2f2f2;">
                <tr>
                    <th>Zdjęcie</th>
                    <th>Tytuł</th>
                    <th>Autor</th>
                    <th>Widoczność</th>
                    <th>Wybierz</th>
                    <th>Zapamiętaj wybrane<br><button type="submit">Zapisz</button></th>
                </tr>';
    
    
        foreach ($images as $image) {

            // Delete all images
            // $db->images->deleteOne(
            //     ['_id' => $image["_id"]]
            // );
            
            $checkboxChecked = "false";
            if (isset($_SESSION['checked'])) {
                if (in_array($image["_id"] ,$_SESSION['checked'])) {
                    $checkboxChecked = "true";
                }
            }
    
            
            $visibility = $image['visibility'] ?? "public";
            
            echo '<tr>
                    <td>
                        <a href="small/'.$image['fileName'].'"><img src="thumbnails/'.$image['fileName'].'" /></a>
                    </td>
                    <td>
                        '.$image['title'].'
                    </td>
                    <td>
                        '.$image['author'].'
                    </td>
                    <td>
                        '.$visibility.'
                    </td>';
            
            if ($checkboxChecked == "true") {
                echo '<td>
                        <input type="checkbox" id="'.$image['_id'].'" name="'.$image['_id'].'" checked>
                    </td>
                </tr>';
            } else {
                echo '<td>
                        <input type="checkbox" id="'.$image['_id'].'" name="'.$image['_id'].'">
                    </td>
                </tr>';
            }
                    
        }
    
        echo '</table>';
    
        echo '</form>';
    }

    public function uploadImage() {
        include_once '../app/core/DB.php';

        session_start();

        /* Get the name of the file uploaded to Apache */
        $filename = $_FILES['file']['name'];
        $watermarkValue = $_POST['watermark'];
        $titleValue = $_POST['title'];
        $authorValue = $_POST['author'] ?? $_SESSION['userLogin'];
        $visibility = $_POST['visibility'];


        /* Prepare to save the file upload to the upload folder */
        $location = "images/".$filename;

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
                $font_path = 'assets/better-yesterday.ttf';

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
                $font_path = 'assets/better-yesterday.ttf';

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

        /* Permanently save the file upload to the upload folder */
        if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) {
            addWatermark($filename, $watermarkValue);
            uploadImageDataToDB($titleValue, $authorValue, $watermarkValue, $filename, $visibility);
        } else { 
            echo '<p>The php and HTML5 file upload failed.</p>'; 
        }

        header("Location: /public/gallery");
    }

    function saveChecked() {
        session_start();
    
        $_SESSION["checked"] = array();
    
        foreach($_GET as $key => $value) {
            array_push($_SESSION["checked"], $key);
        }
    
        $checkedIDs = $_SESSION['checked'];
        
        header("Location: /public/gallery?saved=yes");
    }

    function showAlert() {
        session_start();
        if (isset($_GET["saved"])) {
            echo '<script>alert("Zapisano wybrane zdjęcia")</script>';
        }
    }
}

?>