<?php

// accept header (overly simple parsing example)
if((isset($_SERVER['HTTP_ACCEPT'])) && false !== strpos($_SERVER['HTTP_ACCEPT'], "html")) {
    $format = "html";
} else {
    $format = "json";
}

// poorman's storage solution
$events = unserialize(file_get_contents("events.txt"));

set_exception_handler(function ($e) use ($format) {
    http_response_code($e->getCode());
    send_output($e->getMessage(), $format);
});

// verb
$method = $_SERVER['REQUEST_METHOD'];

// should parse parameters here for testability

// resource or collection - parse the URL segments
$pieces = explode("/", $_SERVER['PATH_INFO']);

// route the request using all this info
switch($pieces[1]) {
    case "events":
        $func_name = "events_" . $method;
        if(function_exists($func_name)) {
            $data = $func_name();
        } else {
            throw new Exception("Method not available", 405);
        }
        break;
    default:
        throw new Exception("Unknown URL", 404);
        break;
}

send_output($data, $format);

/**
 * Very primitive html/json output handler
 */
function send_output($data, $format) {
    if($format == "html") {
        print_r($data);
    } else {
        header("Content-Type: application/json");
        echo json_encode($data);
    }
}

/**
 * Fetch all events or just one
 */
function events_GET() {
    // inject or read from a registry in a more complete system
    global $pieces;

    if(isset($pieces[2])) {
        $index = (int)$pieces[2];
        if(isset($GLOBALS['events'][$index])) {
            return $GLOBALS['events'][$index];
        }
    }
    return $GLOBALS['events'];
}

/**
 * Store a new event (accepts an array of incoming params)
 */
function events_POST() {
    if(isset($_POST['name'])) {
        $event = array();
        // support more fields here
        $event['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $GLOBALS['events'][] = $event;

        // add pretend hypermedia
        foreach($GLOBALS['events'] as $key => $event) {
            if(!isset($event['url'])) {
                $GLOBALS['events'][$key]['url'] = "http://localhost:8888/events/" . $key;
            }
        }

        file_put_contents("events.txt", serialize($GLOBALS['events']));
        return $event;
    }
}

function events_DELETE() {
    // inject or read from a registry in a more complete system
    global $pieces;

    if(!empty($pieces[2])) {
        $index = (int)$pieces[2];
        unset($GLOBALS['events'][$index]);
        file_put_contents("events.txt", serialize($GLOBALS['events']));
    }
    header("Location: http://localhost:8888/events", false, 204);
}


