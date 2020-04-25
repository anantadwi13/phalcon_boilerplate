<?php

use Phalcon\Config;
use Phalcon\Di;
use Phalcon\Mvc\View;

/** @var Config $config */
/** @var Di $di */


/**
 * View
 *
 * Override viewsDir, it will use common layouts
 *
 * @var View $view
 */
$view = $di->get('view');
$view->setViewsDir(__DIR__ . '/../resources/views/');
//$view->setLayoutsDir(__DIR__ . '/../resources/layouts/');
//$view->setPartialsDir(__DIR__ . '/../resources/partials/');
//$view->setLayout('main');


/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di['db'] = function () use ($config) {
    $dbConfig = $config->database->toArray();

    $dbAdapter = '\Phalcon\Db\Adapter\Pdo\\' . $dbConfig['adapter'];
    unset($config['adapter']);

    return new $dbAdapter($dbConfig);
};