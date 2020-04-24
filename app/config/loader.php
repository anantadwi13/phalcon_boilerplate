<?php

$loader = new \Phalcon\Loader();

/** @var \Phalcon\Config $config */
/**
 * We're a registering a set of directories taken from the configuration file
 */

$loader->registerNamespaces([
    'Phalcon\Db' => APP_PATH . '/lib/Phalcon/Db',
    'App\Common\Controllers' => APP_PATH . '/common/controllers',
]);

$loader->register();
