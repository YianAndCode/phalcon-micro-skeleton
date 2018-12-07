<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->tasksDir,
        $config->application->traitsDir,
    ]
)->register();

$loader->registerNamespaces([
    'Controllers' => APP_PATH . '/controllers/',
    'Middlewares' => APP_PATH . '/middlewares/',
    'Models'      => APP_PATH . '/models/',
    'Services'    => APP_PATH . '/services/',
    'Traits'      => APP_PATH . '/traits/',
]);