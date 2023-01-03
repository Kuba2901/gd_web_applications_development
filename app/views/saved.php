<?php 
$_saved = new Saved();
$_saved->showAlert();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/korki.css">
    <link rel="stylesheet" href="css/gallery.css">
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
      <a class="active" href="saved">Zapisane</a>
      <a href="login"><?=isset($_SESSION["userLogin"]) ? "Wyloguj": "Zaloguj"?></a>
    </div>
    <div style="height: 3rem;"></div>
    <header>
      <h1 style="color: #f2f2f2">Zapisane</h1>
    </header>
    <div style="height: 50px; text-align: center; color: #f2f2f2"></div>
    <?php
        $_saved = new Saved();
        $_saved->showImages();
    ?>
  </body>
</html>
