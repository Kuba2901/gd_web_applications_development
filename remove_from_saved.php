<?php 

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

    header("Location: saved_images.php?removed=true");
}

removeFromSaved();

?>