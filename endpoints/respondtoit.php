<?php

require "../vendor/autoload.php";

// register an empty endpoint to begin: http://respondto.it
$url = "http://respondto.it/my-endpoint";

$client = new \GuzzleHttp\Client();
// $client->get($url);

// with headers and data
$request = $client->createRequest('POST', $url . "?page=4");
$request->setHeader("Authorization", "token abcd1234");
$request->setHeader("User-Agent", "GuzzlePHP");
$requestBody = $request->getBody();
$requestBody->setField("name", "Camilla");
$requestBody->setField("species", "Camel");
$response = $client->send($request);
