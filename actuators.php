<!DOCTYPE html>
<html lang="de">

<head>
  <!--Verlinkungen von CSS, JS ; Meta/Kopfdaten ; Titel-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/Chart.js"></script>
  <script src="js/popper.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Aktoren</title>
</head>
<body>

  <!--Navigationsleiste-->
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="index.html">Zurück zum Start</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="heating.php">Heizung</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="actuators.php">Aktoren</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="temperature.php">Temperatur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="humidity.php">Luftfeuchtigkeit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="proximity.php">Präsenz</a>
        </li>
      </ul>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="Piscis-debug.apk">Hol dir die App!</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="impressum.html">Impressum</a>
        </li>
      </ul>
    </div>
  </nav>

  <!--Inhalt-->
  <center>
  <div class="funktion">
    <br>
    <h1>Aktoren</h1>
    <br>
    <br>
    <h4>Wohnzimmerlampe</h4>
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success">
        <input type="radio" name="options" id="option1" autocomplete="off">Einschalten
      </label>
      <label class="btn btn-danger">
        <input type="radio" name="options" id="option2" autocomplete="off">Ausschalten
      </label>
    </div>
    <br>
    <br>
    <br>
    <h4>PC im Schlafzimmer</h4>
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success">
        <input type="radio" name="options" id="option3" autocomplete="off">Einschalten
      </label>
      <label class="btn btn-danger">
        <input type="radio" name="options" id="option4" autocomplete="off">Ausschalten
      </label>
    </div>
    <br>
    <br>
    <br>
    <h4>Fernseher im Wonzimmer</h4>
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success">
        <input type="radio" name="options" id="option5" autocomplete="off">Einschalten
      </label>
      <label class="btn btn-danger">
        <input type="radio" name="options" id="option6" autocomplete="off">Ausschalten
      </label>
    </div>
    <br>
    <br>
    <br>
    <h4>Radio in der Küche</h4>
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-success">
        <input type="radio" name="options" id="option7" autocomplete="off">Einschalten
      </label>
      <label class="btn btn-danger">
        <input type="radio" name="options" id="option8" autocomplete="off">Ausschalten
      </label>
    </div>
  </div>
  </center>

</body>
</html>