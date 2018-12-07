<?php
use Phalcon\Events\Manager;
use Phalcon\Mvc\Micro\Collection as MicroCollection;

$eventsManager = new Manager;

$app->get('/', function () {
    echo '<h1>It works</h1>';
});


/**
 * Not found handler
 */
$app->notFound(function () use($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo "<h1>404 Not found</h1>";
});

$app->setEventsManager($eventsManager);
