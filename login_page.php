<?php 

session_start();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/gallery.css">
    <link rel="stylesheet" href="styles/login.css">
    <title>Moje Hobby - Języki</title>
  </head>
  <body>
    <div class="navbar">
      <div class="dropdown">
        <div class="dropbtn">Home
          <a href="index.html"></a>
        </div>
        <div class="dropdown-content">
          <a href="index.html#skromne-p">Skromne Początki</a>
          <a href="index.html#punkt-z">Punkt zwrotny</a>
          <a href="index.html#nastepny-k">Następny krok</a>
        </div>
      </div>
      <a href="why.html">Dlaczego</a>
      <a href="stats.html">Informacje</a>
      <a href="korki.html">Korki</a>
      <a href="image_gallery.php">Galeria Zdjęć</a>
      <a href="login_page.php" class="active">Zaloguj się</a>
    </div>
    <header>
      <h1 style="color: #f2f2f2">Log in</h1>

    </header>
    
    <?php 
  
    if (isset($_GET['loginSuccessful'])) {
      $loginSuccessful = $_GET['loginSuccessful'];
      if ($loginSuccessful == "true") {
        echo '<script>alert("Login successful")</script>';

      } else if ($loginSuccessful == "false") {
        echo '<script>alert("Login not successful")</script>'; 
      } 
    }

    if(isset($_SESSION['userLogin'])): 
      $usernameLogin = $_SESSION['userLogin'];
    ?>
     
      <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
          <form action="logout.php" method="POST">
              <p>Logged in as <?php echo '<strong>'.$usernameLogin.'</strong>'?>

              <button class="formbold-btn" value="submit">
                  Logout
              </button>
          </form>
        </div>
      </div>
    <?php else : ?>
      <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
          <form action="login_process.php" method="POST">
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
                    <label for="password" class="formbold-form-label"> Password </label>
                </div>
              </div>
              <p>Don't have an account? <a href="register_page.php"><span style="color: purple">Register</span></a></p>

              <button class="formbold-btn" value="submit">
                  Login
              </button>
          </form>
        </div>
      </div>
    <?php endif; ?>      
  </body>
</html>
