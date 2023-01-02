<?php 

require_once "db_connect.php";

$login = $_POST["login"];
$password = $_POST["password"];

function loginUser($login, $password) {
    $db = GetDatabase::get_db();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $userAccount = $db->users->findOne([
        "login" => $login,
    ]);

    if (password_verify($password, $userAccount['password'])) {
        session_start();
        $_SESSION["userLogin"] = $login;
        $_SESSION["userEmail"] = $userAccount['emailAddress'];
        
        header("Location: login_page.php?loginSuccessful=true");
        // Chosen checkboxes later
    } else {
        header("Location: login_page.php?loginSuccessful=false");
    }
}

loginUser($login, $password);

?>