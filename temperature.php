<!DOCTYPE html>
<html lang="de">

<?php
$link= mysqli_connect("localhost","root","root","piscis");
       mysqli_set_charset($link,"utf8");
$sql = "SELECT tmp_id, tmp_timestamp, tmp_messwert
        FROM tmp_messdaten";
$result = mysqli_query($link,$sql);

$i=0;
$chart_labels = "labels: [";
while($row=mysqli_fetch_array($result))
{
  $i++;
  //$md_data[$row["tmp_timestamp"]][$row["tmp_id"]] .= $row["tmp_messwert"].',';
  if ((round(strtotime($row["tmp_timestamp"])/600)*600) != $old_timestamp)
  {
    $chart_labels .= "'".date('Y-m-d H:i', round(strtotime($row["tmp_timestamp"])/600)*600)."',";
  }

  $old_timestamp = round(strtotime($row["tmp_timestamp"])/600)*600;
}
$chart_labels = rtrim($chart_labels, ',');
$chart_labels .= "]";

$chart_data = "datasets: [";
$r = 0;
$g = 150;
$b = 100;
foreach ($old_timestamp as $key => $tmp_id) {
  foreach ($tmp_id as $key => $value) {
    $color = $r.','.$g.','.$b;
    $chart_data .= '{label: "'.$key.'",';
    $chart_data .= 'fillColor: "rgba('.$color.', 0.2)",';
    $chart_data .= 'strokeColor: "rgb('.$color.')",';
    $chart_data .= 'pointColor: "rgba('.$color.',1)",';
    $chart_data .= 'pointStrokeColor: "#fff",';
    $chart_data .= 'pointHighlightFill: "#fff",';
    $chart_data .= 'pointHighlightStroke: "rgba('.$color.',1)",';
    $chart_data .= 'data: ['.rtrim($value,',').']},';
    $r = $r+10;
    $b = $b+60;
    if ($r > 250) $r = 50;
    if ($g > 250) $g = 150;
    if ($b > 250) $b = 0;
  }
}
$chart_data = rtrim($chart_data, ',');
$chart_data .= "]";
?>

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
  <title>Temperatur</title>
</head>
<body onload="displayLineChart();">

  <!--Navigationsleiste-->
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="index.html">Netzwerkfähige Haussteuerung</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="funktion.html">Wie es funktioniert</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="temperature.php">Temperatur</a>
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
    
    <canvas id="lineChart" height="250" width="500"></canvas></div>
    <script>
      var ctx = document.getElementById("lineChart");
      var lineChart = new Chart(ctx, {
        type: 'line',
        <?php echo $chart_labels; ?>,
        <?php echo $chart_data; ?>
      });
    </script>

    <!--<canvas id="myChart" width="400" height="100"></canvas>-->
    <script>
    /*var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [21, 19, 3, 5, 2, 3],
                backgroundColor: [
                    '#648BBF'
                ],
                borderColor: [
                    '#435D7F'
                ],
                borderWidth: 1
            }]
        },
        options: {}
    });*/
    </script>

  </div>
  </center>

  <div class="list">
    <table class="table table-bordered table-sm">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Timestamp</th>
            <th scope="col">Messwert</th>
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

  <!--Footer-->
  <center>
  <footer class="footer fixed-bottom">
    <div class="container">
      <span class="text-muted">&copy; Florian Fußthaler &amp; Tizian Grundböck</span>
    </div>
  </footer>
  </center>

</body>
</html>