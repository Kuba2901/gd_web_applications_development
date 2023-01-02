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
      <div class="dropdown active">
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
      <a href="login.html" class="active">Zaloguj się</a>
    </div>
    <header>
      <h1 style="color: #f2f2f2">Register</h1>

    </header>
    <div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
    <form action="register_process.php" method="POST">
        <div class="formbold-input-flex">
          <div>
              <input
              type="email"
              name="emailAddress"
              id="emailAddress"
              required
              class="formbold-form-input"
              />
              <label for="emailAddress" class="formbold-form-label"> Email Address </label>
          </div>
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
          <div>
              <input
              type="password"
              name="repeatPassword"
              id="repeatPassword"
              class="formbold-form-input"
              required
              />
              <label for="repeatPassword" class="formbold-form-label"> Repeat password </label>
          </div>
        </div>

        <p>Already a user? <a href="login_page.php"><span style="color: purple">Log in</span></a></p>

        <button class="formbold-btn" value="submit">
            Register
        </button>
    </form>
  </div>
  </div>
  </body>
</html>
