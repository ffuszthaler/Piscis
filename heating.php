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
  <title>Heizung</title>
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
          <a class="nav-link active" href="heating.php">Heizung</a>
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
    <h1>Heizungssteuerung</h1>
    <br>
    <br>
    <form action="/mqtt/on.php" method="get">
      <button type="submit" class="btn btn-success">Einschalten</button>
      <button type="submit" formaction="/mqtt/off.php" class="btn btn-danger">Ausschalten</button>
      <br>
      <br>
      <button type="submit" formaction="/mqtt/temp_18.php" class="btn btn-primary">18&#8451;</button>
      <button type="submit" formaction="/mqtt/temp_20.php" class="btn btn-primary">20&#8451;</button>
      <button type="submit" formaction="/mqtt/temp_22.php" class="btn btn-primary">22&#8451;</button>
      <button type="submit" formaction="/mqtt/temp_24.php" class="btn btn-primary">24&#8451;</button>
    </form>
    <br>
  </div>
  </center>
    <br>
    <br>
  <div class="list">
    <table class="table table-bordered table-sm">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Zeit</th>
            <th scope="col">Temperatur (&#8451;)</th>
        </tr>
        <?php
            $link= mysqli_connect("localhost","root","root","piscis");
                   mysqli_set_charset($link,"utf8");

            $sql = "SELECT tmp_id, tmp_timestamp, tmp_messwert
                      FROM tmp_messdaten";
          
            $result = mysqli_query($link,$sql);
            while($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>".$row["tmp_id"]."</td>";
                echo "<td>".$row["tmp_timestamp"]."</td>";
                echo "<td>".$row["tmp_messwert"]."</td>";
                echo "</tr>";
            }
        ?>
    </table>
  </div>

</body>
</html>