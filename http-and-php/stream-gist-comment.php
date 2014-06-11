<?php

// include credentials from an external file
include("github_access_token.php");

$comment = json_encode(array("body" => "This is a great comment"));

// initialise the request
$url = "https://api.github.com/gists/bf6c595b6686d38f44ab/comments";
$options = array(
    "http" => array(
        "header" => array("User-Agent: php-curl",
            "Content-Type: application/json",
            "Authorization: token " . $gh_key),
        "method" => "POST",
        "content" => $comment
    ));

$response = file_get_contents($url, false, stream_context_create($options));

// 201 expected and a redirect
print_r($http_response_header);
