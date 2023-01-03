<?php 

class Register extends Controller {
    public function index() {
        $this->view('register');
    }
    
    function processRegister() {
        require_once "../app/core/DB.php";

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

                session_start();
                $_SESSION['userLogin'] = $login;
                $_SESSION['userEmail'] = $emailAddress;

                header("Location: /public/login");


            } else {
                header("Location: /public/register?registerSuccessful=false");

            }
        }

        if ($password == $repeatPassword) {
            registerUser($emailAddress, $login, $password);
        } else {
            header("Location: /public/register?registerSuccessful=false");
        }
    }

    function showAlert() {
        if (isset($_GET["registerSuccessful"])) {
            $success = $_GET["registerSuccessful"];
            if ($success === "true") {
                echo '<script>alert("Rejestracja przebiegła pomyślnie")</script>';
            } else {
                echo '<script>alert("Rejestracja nie przebiegła pomyślnie")</script>';
            }
        }
    }

}

?>