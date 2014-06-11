<?php

// initialise the request
$url = "https://api.github.com/users/lornajane-demo/gists";
$options = array(
    "http" => array(
        "header" => array("User-Agent: php-curl")
    ));

$response = file_get_contents($url, false, stream_context_create($options));

if(false !== $response) {
    // echo $response;

    // understand the response
    $data = json_decode($response, true);
    foreach($data as $gist) {
        echo $gist['description'] . ": " . $gist['url'] . "\n";
    }
} else {
    // all the meta data is here
    print_r($http_response_header);
}

