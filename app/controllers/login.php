<?php 

class Login extends Controller {
    public function index() {
        $this->view('login');
    }

    
    function loginUser() {
        include_once '../app/core/DB.php';
        $login = $_POST["login"];
        $password = $_POST["password"];
        $db = GetDatabase::get_db();

        $userAccount = $db->users->findOne([
            "login" => $login,
        ]);

        if (password_verify($password, $userAccount['password'])) {
            session_start();
            $_SESSION["userLogin"] = $login;
            $_SESSION["userEmail"] = $userAccount['emailAddress'];
            
            header("Location: /public/login?loginSuccessful=true");
        } else {
            header("Location: /public/login?loginSuccessful=false");
        }
    }

    function logoutUser() {
        session_start();
        session_destroy();
        header("Location: /public/login");
    }

    function showAlert() {
        if (isset($_GET['loginSuccessful'])) {
            $loginSuccessful = $_GET['loginSuccessful'];
            if ($loginSuccessful == "true") {
              echo '<script>alert("Logowanie powiodło się")</script>';
      
            } else if ($loginSuccessful == "false") {
              echo '<script>alert("Logowanie nie powiodło się")</script>'; 
            } 
          }
    }

    function showLoginForm() {
        if (isset($_SESSION['userLogin'])) {
            $usernameLogin = $_SESSION['userLogin'];
            echo '
            <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
              <form action="login/logoutUser" method="POST">
                  <p>Zalogowano jako <strong>'.$usernameLogin.'</strong>
                  <button class="formbold-btn" value="submit">
                      Wyloguj się
                  </button>
              </form>
            </div>
          </div>
            ';
        } else {
            echo '
            <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
              <form action="login/loginUser" method="post">
                  <div class="formbold-input-flex">
                    <div>
                        <input
                        type="text"
                        name="login"
                        id="login"
                        required
                        class="formbold-form-input"
                        />
                        <label for="login" class="formbold-form-label"> Login </label>
                    </div>
                  </div>
    
                  <div class="formbold-input-flex">
                    <div>
                        <input
                        type="password"
                        name="password"
                        id="password"
                        class="formbold-form-input"
                        required
    
                        />
                        <label for="password" class="formbold-form-label"> Hasło </label>
                    </div>
                  </div>
                  <p>Nie masz konta? <a href="register"><span style="color: purple">Zarejestruj się</span></a></p>
    
                  <button class="formbold-btn" value="submit">
                      Zaloguj
                  </button>
              </form>
            </div>
          </div>
            ';
        }
    }
}

?>