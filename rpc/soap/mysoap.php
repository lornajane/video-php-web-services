<?php

// use the class we already made
require "../api/Events.php";

$options = array("uri" => "localhost:8080/server.php");
$server = new SoapServer(null, $options);

$server->setClass('Events');
$server->handle();

