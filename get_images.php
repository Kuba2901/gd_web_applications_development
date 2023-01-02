<?php 

include 'db_connect.php';

function showImages() {
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

    echo '<form action="save_checked.php" method="get">';

    echo '<table style="width: 60%; margin-left: auto; margin-right: auto; color: #f2f2f2;">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Author</th>
                <th>Visibility</th>
                <th>CheckBox</th>
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

?>