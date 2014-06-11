<?php

require "../vendor/autoload.php";

$url = "https://api.github.com/users/lornajane-demo/gists";

$client = new GuzzleHttp\Client();
$response = $client->get($url);

if($response->getStatusCode() == 200) {
    $data = json_decode($response->getBody(), true);
    foreach($data as $gist) {
        echo $gist['description'] . ": " . $gist['url'] . "\n";
    }

} else {
    echo $response->getBody();
}
