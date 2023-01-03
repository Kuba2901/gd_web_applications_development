<?php
$_register = new Register();
$_register->showAlert();
?>
<html lang="pl">
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Moje Hobby - Języki</title>
  </head>
  <body>
  <div class="navbar">
      <div class="dropdown">
        <div class="dropbtn">Home
          <a href="/public"></a>
        </div>
        <div class="dropdown-content">
          <a href="/public/#skromne-p">Skromne Początki</a>
          <a href="/public/#punkt-z">Punkt zwrotny</a>
          <a href="/public/#nastepny-k">Następny krok</a>
        </div>
      </div>
      <a href="why">Dlaczego</a>
      <a href="info">Informacje</a>
      <a href="classes">Korki</a>
      <a href="gallery">Galeria</a>
      <a href="search">Wyszukaj</a>
      <a href="saved">Zapisane</a>
      <a  class="active" href="login"><?=isset($_SESSION["userLogin"]) ? "Wyloguj": "Zaloguj"?></a>
    </div>
    <div style="height: 3rem;"></div>
    <header>
      <h1 style="color: #f2f2f2"> Zarejestruj </h1>
    </header>
    <div class="formbold-main-wrapper">
  <div class="formbold-form-wrapper">
    <form action="register/processRegister" method="POST">
        <div class="formbold-input-flex">
          <div>
              <input
              type="email"
              name="emailAddress"
              id="emailAddress"
              required
              class="formbold-form-input"
              />
              <label for="emailAddress" class="formbold-form-label"> Adres email </label>
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
              <label for="password" class="formbold-form-label"> Hasło </label>
          </div>
          <div>
              <input
              type="password"
              name="repeatPassword"
              id="repeatPassword"
              class="formbold-form-input"
              required
              />
              <label for="repeatPassword" class="formbold-form-label"> Powtórz hasło </label>
          </div>
        </div>

        <p>Masz już konto? <a href="login"><span style="color: purple">Zaloguj się</span></a></p>

        <button class="formbold-btn" value="submit">
            Zarejestruj się
        </button>
    </form>
  </div>
  </div>
  </body>
</html>
