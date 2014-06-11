<?php

require "../vendor/autoload.php";
// pull the access creds from another file
require "github_access_token.php";

$url = "https://api.github.com/gists/bf6c595b6686d38f44ab/comments";
$comment = json_encode(array("body" => "A comment is made here"));

$client = new GuzzleHttp\Client();
$request = $client->createRequest('POST', $url);
$request->setHeader("Authorization", "token " . $gh_key);
$request->setBody(\GuzzleHttp\Stream\Stream::factory($comment));
$response = $client->send($request);

echo $response->getStatusCode();

