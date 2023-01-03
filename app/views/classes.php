<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/korki.css">
    <title>Korki</title>
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
      <a class="active" href="classes">Korki</a>
      <a href="gallery">Galeria</a>
      <a href="search">Wyszukaj</a>
      <a href="saved">Zapisane</a>
      <a href="login"><?=isset($_SESSION["userLogin"]) ? "Wyloguj": "Zaloguj"?></a>
    </div>
      <div class="ui-widget" id="success-alert" style="display: none;">
        <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em; background-color: #1b1b1b;">
          <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
          <strong>Sukces!</strong> Formularz został przesłany.</p>
        </div>
      </div>
      <br>
      <div class="ui-widget" id="error-alert" style="display: none;">
        <div class="ui-state-error ui-corner-all" style="padding: 0 .7em; background-color: #1b1b1b;">
          <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
            <strong>Błąd!</strong> Niektóre z pól nie zostały wypełnione.</p>
        </div>
      </div>
  
    <article>
        <header>
          <h1>Zapisz się na korepetycje</h1>
          <h2>
            Umów się na zajęcia indywidualne ze mną z języków angielskiego lub francuskiego
          </h2>
        </header>
    </article>
    <section class="form">
            <form id="form">
              <div class="row">
                <div >
                  <label for="firstName">Imię</label><br>
                  <input type="text" id="firstName" name="firstName" title="Pełne imię"><br><br>
                  <label for="lastName">Nazwisko</label><br>
                  <input type="text" id="lastName" name="lastName"><br><br>
                  <label for="email">Adres email</label><br>
                  <input type="text" id="email" name="email"><br><br>
                  <p>Wybierz język</p>
                  <input type="radio" id="french" name="lang" value="Francuski">
                  <label for="french">Francuski</label><br>
                  <input type="radio" id="english" name="lang" value="Angielski" checked>          
                  <label for="english">Angielski</label><br><br>
                  <p>Poziom języka</p>
                  <input type="radio" id="a1" name="level" value="A1">
                  <label for="a1">A1</label><br>
                  <input type="radio" id="a2" name="level" value="A2">          
                  <label for="a2">A2</label><br><br>
                  <input type="radio" id="b1" name="level" value="B1" checked>
                  <label for="b1">B1</label><br>
                  <input type="radio" id="b2" name="level" value="B2">          
                  <label for="b2">B2</label><br><br>
                  <input type="radio" id="c1" name="level" value="C1">
                  <label for="c1">C1</label><br>
                  <input type="radio" id="c2" name="level" value="C1">          
                  <label for="c2">C2</label><br><br>
                </div>
                <div>
                  <label for="firstName">Data pierwszych zajęć</label><br>
                  <input type="text" id="datepicker" name="datepicker" placeholder="dd/mm/yyyy"><br><br>
                  <label for="hours">Liczba godzin w tygodniu</label><br>
                  <select id="hours" name="hours">
                    <option value="1">1</option>
                    <option value="1,5">1,5</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                  <br>
                  <br>
                  <label for="onlineCheckBox">Czy preferujesz zajęcia online?</label><br>
                  <input type="checkbox" name="online" id="onlineCheckBox"><br>
                  <br>
                  <h2 style="color: #f2f2f2;">Zakończ formularz</h2><br>
                  <input type="submit" name="submitBtn" id="submitBtn">
                  <input type="reset">
                </div>
              </div>
          </form>
    </section>
    <div>
      <svg style="height: 300px; width: 300px">
        <polygon points="100,10 40,198 190,78 10,78 160,198"
        style="fill:yellow;stroke-width:5;fill-rule:nonzero;" />
      </svg>
    </div>
    <footer class="ftr">
        <p>Jakub Nenczak, 5, 19.10.2022</p>
    </footer>
</body>
</html>


