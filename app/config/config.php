<?php

use Phalcon\Config;

return new Config([
    'mode' => getenv('APP_MODE') ?: 'DEVELOPMENT', //DEVELOPMENT, PRODUCTION
    'database' => [
        'adapter'     => getenv('DB_ADAPTER'),
        'host'        => getenv('DB_HOST'),
        'port'        => getenv('DB_PORT'),
        'username'    => getenv('DB_USERNAME'),
        'password'    => getenv('DB_PASSWORD'),
        'dbname'      => getenv('DB_NAME'),
        'charset'     => getenv('DB_CHARSET'),
    ],
    'application' => [
        'appDir'                => APP_PATH . '/',
        'commonResourceDir'     => APP_PATH . '/common/resources/',
        'pluginsDir'            => APP_PATH . '/plugins/',
        'libraryDir'            => APP_PATH . '/library/',
        'cacheDir'              => BASE_PATH . '/cache/',
        'baseUri'               => getenv('BASE_URI') ?: '/',
        'defaultModule'         => getenv('DEFAULT_MODULE'),
    ],
    'version' => getenv('APP_VERSION'),
]);
