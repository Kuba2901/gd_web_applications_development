<?php 
session_start();

if (isset($_GET["removed"])) {
  echo '<script>alert("Usunięto wybrane zdjęcia")</script>';
}

?>
<!DOCTYPE html>
<html lang="pl">
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/gallery.css">
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
      <a href="login.html">Zaloguj się</a>
    </div>
    <div style="height: 50px;"></div>
    <h2 style="text-align: center; color: #f2f2f2">Zapisane zdjęcia</h2>
    <div style="height: 50px; text-align: center; color: #f2f2f2"></div>
    <?php
      include 'get_saved_images.php';
      showImages();
    ?>
  </body>
</html>
