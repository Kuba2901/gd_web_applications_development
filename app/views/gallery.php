<?php
$_gallery = new Gallery();
$_gallery ->showAlert();
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
      <a class="active" href="gallery">Galeria</a>
      <a href="search">Wyszukaj</a>
      <a href="saved">Zapisane</a>
      <a href="login"><?=isset($_SESSION["userLogin"]) ? "Wyloguj": "Zaloguj"?></a>
    </div>
    <div style="height: 3rem;"></div>
    <header>
      <h1 style="color: #f2f2f2">Galeria</h1>

    </header>
    <div class="formbold-main-wrapper">
      <div class="formbold-form-wrapper">
        <form action="gallery/uploadImage" method="post" enctype="multipart/form-data">
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
                  <label for="title" class="formbold-form-label"> Tytuł </label>
              </div>
            </div>
    
            <div class="formbold-input-flex">
              <div>
                  <?php
                  $_gallery = new Gallery();
                  $_gallery ->autofillAuthor();
                  ?>
                  <label for="author" class="formbold-form-label"> Autor 
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
                  <label for="watermark" class="formbold-form-label"> Znak wodny </label>
              </div>
            </div>

            <label for="avatar" style="color: #f2f2f2;">Wybierz zdjęcie:</label>
            <br>
            <br>
            <input id="file" type="file" name="file" accept="image/png, image/jpeg" required/>
            <?php
              $_gallery = new Gallery();
              $_gallery ->showPublicPrivate();
            ?>
            <br>
            <button class="formbold-btn" type="submit" value="Upload">
                Prześlij
            </button>
        </form>
      </div>
    </div>
    <style>
    </style>      
    </form>
    <?php
      $_gallery = new Gallery();
      $_gallery ->showImages();
    ?>
  </body>
</html>
