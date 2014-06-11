<?php

// include credentials from an external file
include("github_access_token.php");

// initialise the request
$url = "https://api.github.com/gists/bf6c595b6686d38f44ab/star";
$options = array(
    "http" => array(
        "header" => array("User-Agent: php-curl",
            "Content-Length: 0",
            "Authorization: token " . $gh_key),
        "method" => "PUT"
    ));

$response = file_get_contents($url, false, stream_context_create($options));

// 204 expected so no response - empty rather than false
// print_r($http_response_header);
