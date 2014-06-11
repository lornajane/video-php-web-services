<?php

// include credentials from an external file
include("github_access_token.php");

$comment = json_encode(array("body" => "I made a comment"));

$curl = curl_init("https://api.github.com/gists/9376b77a6994b48356f5/comments");

// set some options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $comment);
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array("User-Agent: php-curl",
        "Authorization: token " . $gh_key));

// make the request
$response = curl_exec($curl);
$info = curl_getinfo($curl);

if($info['http_code'] == 201) {
    // it's all ok
}

curl_close($curl);
