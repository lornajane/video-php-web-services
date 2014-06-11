<?php

require "vendor/autoload.php";

// include the class we want to use
require "../../api/Events.php";

$gen = new \PHP2WSDL\PHPClass2WSDL("Events", "http://localhost:8080/wsdl");
$gen->generateWSDL();

echo $gen->dump();
