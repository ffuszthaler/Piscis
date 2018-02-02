<?php

require("phpMQTT.php");

$server = "10.117.236.240";
$port = 1883;
$username = "piscis";
$password = "piscis";
$client_id = "Piscis-web-publisher";

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish("dev/test", "Hello World!", 0);
	$mqtt->close();
} else {
    echo "Time out!\n";
}
