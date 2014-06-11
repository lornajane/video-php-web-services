<?php

$endpoint = "https://api.flickr.com/services/soap/";

$options = array("location" => $endpoint,
    "uri" => $endpoint);

$client = new SoapClient(null, $options);
$response = $client->__soapCall("flickr.test.echo", array());
var_dump($client, $response);
