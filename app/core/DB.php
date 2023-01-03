<?php 

require '../app/vendor/autoload.php';

class GetDatabase {
    public static function get_db() {
        $mongo = new MongoDB\Client(
            "mongodb://localhost:27017/wai",
            [
                'username' => 'wai_web',
                'password' => 'w@i_w3b',
            ]
            );
    
            $db = $mongo->wai;
    
            return $db;
    }
}
?>