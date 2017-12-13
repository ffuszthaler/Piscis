<?php

require("phpMQTT.php");

$server = "m23.cloudmqtt.com";
$port = 14644;
$username = "npecdscx";
$password = "NnzwxDOIL-x9";
$client_id = "Piscis-publisher";

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish("Piscis/testing", "Hello World!", 0);
	$mqtt->close();
} else {
    echo "Time out!\n";
}
