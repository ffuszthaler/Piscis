<?php

require("phpMQTT.php");

$server = "m23.cloudmqtt.com";
$port = 14644;
$username = "npecdscx";
$password = "4AW6CJ__DQyK";
$client_id = "piscis-heat-20";

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish("heating", "Decrease Temperature to 20", 0);
	$mqtt->close();
} else {
    echo "Time out!\n";
}
