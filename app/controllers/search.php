<?php 

class Search extends Controller {
    public function index() {
        $this->view('search');
    }
    
    public function getResults() {
        include_once '../app/core/DB.php';
        include_once '../app/models/Image.php';
        session_start();

        $db = GetDatabase::get_db();
        $images = $db->images->find();

        $a = [];

        foreach ($images as $image) {
            $title = $image["title"];
            $author = $image["author"];
            $fileName = $image["fileName"];
            $visibility = $image["visibility"];

            $imageObject = new Image();
            $imageObject->set_author($author);
            $imageObject->set_fileName($fileName);
            $imageObject->set_title($title);
            $imageObject->set_visibility($visibility);

            array_push($a, $imageObject);
            }

            // get the q parameter from URL
            $q = $_REQUEST["q"];

            $hints = [];

            // lookup all hints from array if $q is different from ""
            if ($q !== "") {
            $q = strtolower($q);
            $len=strlen($q);
            foreach($a as $imageObject) {
                $name = $imageObject->get_title();
                if (stristr($q, substr($name, 0, $len))) {
                    if (count($hints) == 0) {
                        $hints = [$imageObject];
                    } else {
                        array_push($hints, $imageObject);
                    }
                }
            }
        }

        // Output "no suggestion" if no hint was found or output correct values
        // echo $hint === "" ? "no suggestion" : $hint;
        foreach ($hints as $imageObject) {
            $name = $imageObject->get_title();
            $image = $imageObject->get_fileName();
            $visibility = $imageObject->get_visibility() ?? "public";
            $author = $imageObject->get_author();
            $userLogin = $_SESSION['userLogin'] ?? "";

            if ($visibility == "public" || $userLogin == $author) {
                echo '
                <a href="small/'.$image.'"><img src="thumbnails/'.$image.'"/><br>  <a/>
                ';
            }
        }
    }

}

?>