<?php

require "../vendor/autoload.php";

// get your own request bin http://requestb.in
// $url = "http://requestb.in/example";
$url = "http://requestb.in/1dnfk1w1";

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
