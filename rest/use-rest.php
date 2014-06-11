<?php

// create an event
$event_data = array("name" => "Fabulous Event II");
$post_opts = array("http" => array(
    "method" => "POST",
    "header" => array("Accept: application/json",
        "Content-Type: application/x-www-form-urlencoded"),
    "content" => http_build_query($event_data)
));

$url = "http://localhost:8888/events";
$context = stream_context_create($post_opts);
$post_result = file_get_contents($url, false, $context);
var_dump($post_result, $http_response_header);

// now get the list
$get_result = file_get_contents($url);
var_dump($get_result);

