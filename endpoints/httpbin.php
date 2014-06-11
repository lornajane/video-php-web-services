<?php

// GET request
$curl = curl_init("http://httpbin.org/get?a=42");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
echo $response;

// User-Agent Header
$curl = curl_init("http://httpbin.org/user-agent");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("User-Agent: php-curl"));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

