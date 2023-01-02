<?php 

function saveChecked() {
    session_start();

    $_SESSION["checked"] = array();

    foreach($_GET as $key => $value) {
        array_push($_SESSION["checked"], $key);
    }

    $checkedIDs = $_SESSION['checked'];
    
    header("Location: upload_image.php?saved=true");
}

saveChecked();

?>