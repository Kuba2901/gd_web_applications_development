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
    <script>
    function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
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
      <h1 style="color: #f2f2f2">Search</h1>

    </header>
    
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
          <form action="login_process.php" method="POST">
              <div class="formbold-input-flex">
                <div>
                    <input
                    type="text"
                    id="fname"
                    name="fname"
                    onkeyup="showHint(this.value)"
                    class="formbold-form-input">
                    <label for="login" class="formbold-form-label"> Image title </label>
                </div>
              </div>
          </form>
        </div>
      </div>
      <div style="text-align: center;">
      <div id="txtHint" style="width: 10rem; margin: 0 auto; background: #000; color: #fff;"></div>
    </div>
  </body>
</html>
