<?php 

include 'db_connect.php';

function showImages() {
    $db = GetDatabase::get_db();

    $images = $db->images->find();


    echo '<form action="remove_from_saved.php" method="get">';

    echo '<table style="width: 60%; margin-left: auto; margin-right: auto; color: #f2f2f2;">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Author</th>
                <th>CheckBox</th>
                <th>Usuń zaznaczone z zapamiętanych<br><button type="submit">Usuń</button></th>
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

?>