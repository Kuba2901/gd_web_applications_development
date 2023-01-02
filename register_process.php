<?php 

require_once "db_connect.php";

$emailAddress = $_POST["emailAddress"];
$login = $_POST["login"];
$password = $_POST["password"];
$repeatPassword = $_POST["repeatPassword"];
$db = GetDatabase::get_db();


function checkIfCanRegister($login, $emailAddress) {
    $db = GetDatabase::get_db();
    $usersWithSameLogin = $db->users->count(array('login' => $login));
    $usersWithSameEmail = $db->users->count(array('emailAddress' => $emailAddress));

    if ($usersWithSameLogin > 0) {
        // Login taken
        return 1;
    } else if ($usersWithSameEmail > 0) {
        // Email taken
        return 2;
    } else {
        // Can register
        return 0;
    }
}

function registerUser($emailAddress, $login, $password) {
    $db = GetDatabase::get_db();
    $canRegister = checkIfCanRegister($login, $emailAddress);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($canRegister == 0) {
        $user = [
            'emailAddress' => $emailAddress,
            'login' => $login,
            'password' => $hashedPassword,
        ];
        
        $db->users->insertOne($user);

        header("Location: auth_success.php?login=$login");
    } else {
        header("Location: auth_failed.php?errorCode=$canRegister");

    }
}

registerUser($emailAddress, $login, $password);

?>