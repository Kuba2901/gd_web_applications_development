<?php 
 
class Login {
    public static function loginUser($userLogin) {
        $db = get_db();
        echo "<p>User logged in as $userLogin</p>";

    }

    function logoutUser() {
        echo '<p>User logged out</p>';
    }
}

?>