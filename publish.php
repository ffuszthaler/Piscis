<?php

//Publish.php ist der simulierte Sensor

require("phpMQTT.php");

$server = "m23.cloudmqtt.com";     	// change if necessary
$port = 14644;                     	// change if necessary
$username = "npecdscx";           	// set your username
$password = "NnzwxDOIL-x9";       	// set your password
$client_id = "Piscis-publisher"; 	// make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish("bluerhinos/phpMQTT/examples/publishtest", "Hello World! at " . date("r"), 0);
	$mqtt->close();
} else {
    echo "Time out!\n";
}
