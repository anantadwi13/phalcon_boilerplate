<?php

use Phalcon\Config;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;

/** @var Config $config */

/**
 * View
 */
$di['view'] = function () {
    $view = new View();

    $view->setViewsDir(__DIR__ . '/../views');

    $view->registerEngines([
        '.volt' => 'voltService',
        '.phtml' => PhpEngine::class
    ]);

    return $view;
};

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di['db'] = function () use ($config) {
    $dbConfig = $config->database->toArray();

    $dbAdapter = '\Phalcon\Db\Adapter\Pdo\\' . $dbConfig['adapter'];
    unset($config['adapter']);

    return new $dbAdapter($dbConfig);
};