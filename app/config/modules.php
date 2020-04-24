<?php

return [
    'example' => [
        'className' => 'ProjectName\Example\Module',
        'path' => APP_PATH . '/modules/example/Module.php',
        'namespace' => [
            'base' => 'ProjectName\Example',
            'webController' => 'ProjectName\Example\Controllers\Web',
            'apiController' => 'ProjectName\Example\Controllers\Api'
        ],
        'routing' => [
            'useDefault' => true,
            'defaultController' => 'index',
            'defaultAction' => 'index',
        ],
    ]
];
