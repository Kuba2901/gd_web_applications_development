<?php 

require_once "db_connect.php";

function showUsers() {
    $db = GetDatabase::get_db();
    $users = $db->users->find();

    foreach ($users as $user) {
        echo '<p>'.$user['login'].'</p>';
    }

}

?>