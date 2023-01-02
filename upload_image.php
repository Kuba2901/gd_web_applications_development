<?php 
session_start();

if (isset($_GET["saved"])) {
  echo '<script>alert("Zapisano wybrane zdjęcia")</script>';
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
    <div class="formbold-main-wrapper">
      <div class="formbold-form-wrapper">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <h2 style="color: #f2f2f2">Dodaj zdjęcie</h2>
          <br>
            <div class="formbold-input-flex">
              <div>
                  <input
                  type="text"
                  name="title"
                  id="title"
                  class="formbold-form-input"
                  required
                  />
                  <label for="title" class="formbold-form-label"> Title </label>
              </div>
            </div>
    
            <div class="formbold-input-flex">
              <div>
                  <?php
                  include 'upload_image_methods.php';

                  UploadImageMethods::autofillAuthor();
                  ?>
                  <label for="author" class="formbold-form-label"> Author 
                  </label>
              </div>
            </div>

            <div class="formbold-input-flex">
              <div>
                  <input
                  type="text"
                  name="watermark"
                  id="watermark"
                  class="formbold-form-input"
                  required
                  />
                  <label for="watermark" class="formbold-form-label"> Watermark </label>
              </div>
            </div>

            <label for="avatar" style="color: #f2f2f2;">Wybierz zdjęcie:</label>
            <br>
            <br>
            <input id="file" type="file" name="file" accept="image/png, image/jpeg" required/>
            <?php
              UploadImageMethods::showPublicPrivate();
            ?>
            <br>
            <button class="formbold-btn" type="submit" value="Upload">
                Upload
            </button>
        </form>
      </div>
    </div>
    <style>
    </style>      
    </form>
    <?php
      include 'get_images.php';
      showImages();
    ?>
  </body>
</html>
