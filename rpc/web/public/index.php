<?php
require '../vendor/autoload.php';

// application-specific autoloader
spl_autoload_register(function ($classname) {
    require "../inc/" . $classname . ".php";
});

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
));

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// Define routes
$app->get('/', function () use ($app) {
    // event list
    $client = new ApiClient("http://api.local");
    $events = $client->get("eventList");
    $app->view->setData("events", $events);
    $app->render('events.html');
});
$app->get('/event/:event_id', function ($event_id) use ($app) {
    // event list
    $client = new ApiClient("http://api.local");
    $event = $client->get("event", array("event_id" => $event_id));
    $app->view->setData("event", $event);
    $app->render('event-detail.html');
});

// Run app
$app->run();
