<?php 

class Saved extends Controller {
    public function index() {
        $this->view('saved');
    }

    function showAlert() {
        session_start();

        if (isset($_GET["removed"])) {
        echo '<script>alert("Usunięto wybrane zdjęcia")</script>';
        }
    }
    
    function removeFromSaved() {
        session_start();
        if (isset($_SESSION['checked'])) {
            $checkedIDs = array();
            
            foreach($_GET as $key => $value) {
                array_push($checkedIDs, $key);
            }
    
            foreach($checkedIDs as $id) {
                $_SESSION["checked"] = array_diff($_SESSION["checked"], [$id]);
            }
        }
    
        header("Location: /public/saved?removed=true");
    }

    function showImages() {
        include_once '../app/core/DB.php';
        $db = GetDatabase::get_db();
    
        $images = $db->images->find();
    
    
        echo '<form action="saved/removeFromSaved" method="get">';
    
        echo '<table style="width: 60%; margin-left: auto; margin-right: auto; color: #f2f2f2;">
                <tr>
                    <th>Zdjęcie</th>
                    <th>Tytuł</th>
                    <th>Autor</th>
                    <th>Wybierz</th>
                    <th>Usuń zaznaczone<br><button type="submit">Usuń</button></th>
                </tr>';
    
    
        foreach ($images as $image) {
            $checkboxChecked = "false";
            if (isset($_SESSION['checked'])) {
                if (in_array($image["_id"] ,$_SESSION['checked'])) {
                    $checkboxChecked = "true";
                }
            }
            if ($checkboxChecked == "true") {
                echo '<tr>
                    <td>
                        <a href="small/'.$image['fileName'].'"><img src="thumbnails/'.$image['fileName'].'" /></a>
                    </td>
                    <td>
                        '.$image['title'].'
                    </td>
                    <td>
                        '.$image['author'].'
                    </td>';
            
                if ($checkboxChecked == "false") {
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
                    
        }
    
        echo '</table>';
    
        echo '</form>';
    
        
    
    }
    

}

?>