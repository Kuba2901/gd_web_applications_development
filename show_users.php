<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/korki.css">
    <title>Users</title>
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
        <a href="upload_image.php">Galeria Zdjęć</a>
        <a href="login.html">Zaloguj się</a>
      </div>
      <?php 
      require_once "get_users.php";

      showUsers();
      ?>
    
    <footer class="ftr">
        <p>Jakub Nenczak, 5, 19.10.2022</p>
    </footer>
</body>
</html>


