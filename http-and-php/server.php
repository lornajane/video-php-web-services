<?php

echo "Host: " . $_SERVER['HTTP_HOST'] . "\n";
echo "Url: " . $_SERVER['REQUEST_URI'] . "\n";
echo "Method: " . $_SERVER['REQUEST_METHOD'] . "\n";
echo "Accept: " . $_SERVER['HTTP_ACCEPT'] . "\n";

echo "Query string params: " . var_export($_GET, true) . "\n";

$body = file_get_contents("php://input");
var_dump($body);
$vars = array();
parse_str($body, $vars);
echo "Fields POSTED to the body: " . var_export($vars, true) . "\n";

