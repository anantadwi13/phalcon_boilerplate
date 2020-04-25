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
 * Register your custom services here
 */