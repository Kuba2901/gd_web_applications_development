<?php 
session_start();
?>

<!DOCTYPE html>
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
      <a class="active" href="login"><?=isset($_SESSION["userLogin"]) ? "Wyloguj": "Zaloguj"?></a>
    </div>
    <div style="height: 3rem;"></div>
    <header>
      <h1 style="color: #f2f2f2"> <?=isset($_SESSION["userLogin"]) ? "Wyloguj": "Zaloguj"?> </h1>
    </header>
    
    <?php 
    $_login = new Login();
    $_login ->showAlert();
    $_login->showLoginForm();
    ?>
        
  </body>
</html>
