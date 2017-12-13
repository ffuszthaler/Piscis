<?php

//Publish.php ist der simulierte Sensor

require("phpMQTT.php");

$server = "m23.cloudmqtt.com";
$port = 14644;
$username = "npecdscx";
$password = "NnzwxDOIL-x9";
$client_id = "Piscis-publisher";

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish("bluerhinos/phpMQTT/examples/publishtest", "Hello World! at " . date("r"), 0);
	$mqtt->close();
} else {
    echo "Time out!\n";
}
