<?php

return new \Phalcon\Config([
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
        'appDir'         => APP_PATH . '/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'baseUri'        => getenv('BASE_URI') ?: '/',
        'defaultModule'  => getenv('DEFAULT_MODULE'),
    ],
    'version' => '0.1.0',
]);
