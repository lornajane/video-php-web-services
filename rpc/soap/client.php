<?php

$client = new SoapClient(null, array("uri" => "http://localhost:8080/mysoap.php", "location" => "http://localhost:8080/mysoap.php"));
$response = $client->getEvents();
print_r($response);


