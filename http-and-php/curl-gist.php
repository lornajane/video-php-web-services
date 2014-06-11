<?php

// initialise the request
$curl = curl_init("https://api.github.com/users/lornajane-demo/gists");

// set some options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array("User-Agent: php-curl"));

// make the request
$response = curl_exec($curl);
$info = curl_getinfo($curl);

if($info['http_code'] == 200) {
    echo $response;

    // understand the response
    $data = json_decode($response, true);
    foreach($data as $gist) {
        echo $gist['description'] . ": " . $gist['url'] . "\n";
    }
} else {
    echo "Curl error: " . curl_error($curl);
}

// tidy up
curl_close($curl);

