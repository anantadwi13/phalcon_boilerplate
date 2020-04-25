<?php

/** @var Router $router */

use Phalcon\Di;
use Phalcon\Mvc\Router;

/** @var Di $container */


$router = $container->getRouter();
$config = $container->getConfig();

$defaultModule = $config->application->defaultModule;

$router->clear();
$router->removeExtraSlashes(true);


/**
 * Default Routing
 */
$router->add('/', [
    'namespace' => $this->modules[$defaultModule]['namespace']['webController'],
    'module' => $defaultModule,
    'controller' => isset($modules[$defaultModule]['routing']['defaultController']) ?
        $this->modules[$defaultModule]['routing']['defaultController'] : 'index',
    'action' => isset($modules[$defaultModule]['routing']['defaultAction']) ?
        $this->modules[$defaultModule]['routing']['defaultAction'] : 'index'
]);

$router->add('/:params', array(
    'namespace' => $this->modules[$defaultModule]['namespace']['webController'],
    'module' => $defaultModule,
    'controller' => isset($this->modules[$defaultModule]['routing']['defaultController']) ?
        $this->modules[$defaultModule]['routing']['defaultController'] : 'index',
    'action' => isset($this->modules[$defaultModule]['routing']['defaultAction']) ?
        $this->modules[$defaultModule]['routing']['defaultAction'] : 'index',
    'params' => 1
));

$router->add('/:controller/:params', array(
    'namespace' => $this->modules[$defaultModule]['namespace']['webController'],
    'module' => $defaultModule,
    'controller' => 1,
    'action' => isset($this->modules[$defaultModule]['routing']['defaultAction']) ?
        $this->modules[$defaultModule]['routing']['defaultAction'] : 'index',
    'params' => 2
));

$router->add('/:controller/:action/:params', array(
    'namespace' => $this->modules[$defaultModule]['namespace']['webController'],
    'module' => $defaultModule,
    'controller' => 1,
    'action' => 2,
    'params' => 3
));

$router->add('/api/:params', array(
    'namespace' => $this->modules[$defaultModule]['namespace']['apiController'],
    'module' => $defaultModule,
    'controller' => isset($this->modules[$defaultModule]['routing']['defaultController']) ? $this->modules[$defaultModule]['routing']['defaultController'] : 'index',
    'action' => isset($this->modules[$defaultModule]['routing']['defaultAction']) ? $this->modules[$defaultModule]['routing']['defaultAction'] : 'index',
    'params' => 1
));

$router->add('/api/:controller/:params', array(
    'namespace' => $this->modules[$defaultModule]['namespace']['apiController'],
    'module' => $defaultModule,
    'controller' => 1,
    'action' => isset($this->modules[$defaultModule]['routing']['defaultAction']) ?
        $this->modules[$defaultModule]['routing']['defaultAction'] : 'index',
    'params' => 2
));

$router->add('/api/:controller/:action/:params', array(
    'namespace' => $this->modules[$defaultModule]['namespace']['apiController'],
    'module' => $defaultModule,
    'controller' => 1,
    'action' => 2,
    'params' => 3
));

$router->notFound([
    'namespace' => 'App\Common\Controllers',
    'controllers' => 'error',
    'action' => 'notFound',
]);


/**
 * Module Routing
 */
foreach ($this->modules as $moduleName => $module) {

    if ($module['routing']['useDefault'] == true) {
        /**
         * Default Module routing
         */
        $router->add('/' . $moduleName . '/:params', array(
            'namespace' => $module['namespace']['webController'],
            'module' => $moduleName,
            'controller' => isset($module['routing']['defaultController']) ? $module['routing']['defaultController'] : 'index',
            'action' => isset($module['routing']['defaultAction']) ? $module['routing']['defaultAction'] : 'index',
            'params' => 1
        ));

        $router->add('/' . $moduleName . '/:controller/:params', array(
            'namespace' => $module['namespace']['webController'],
            'module' => $moduleName,
            'controller' => 1,
            'action' => isset($module['routing']['defaultAction']) ? $module['routing']['defaultAction'] : 'index',
            'params' => 2
        ));

        $router->add('/' . $moduleName . '/:controller/:action/:params', array(
            'namespace' => $module['namespace']['webController'],
            'module' => $moduleName,
            'controller' => 1,
            'action' => 2,
            'params' => 3
        ));

        /**
         * Default API Module routing
         */
        $router->add('/' . $moduleName . '/api/:params', array(
            'namespace' => $module['namespace']['apiController'],
            'module' => $moduleName,
            'controller' => isset($module['routing']['defaultController']) ? $module['routing']['defaultController'] : 'index',
            'action' => isset($module['routing']['defaultAction']) ? $module['routing']['defaultAction'] : 'index',
            'params' => 1
        ));

        $router->add('/' . $moduleName . '/api/:controller/:params', array(
            'namespace' => $module['namespace']['apiController'],
            'module' => $moduleName,
            'controller' => 1,
            'action' => isset($module['routing']['defaultAction']) ? $module['routing']['defaultAction'] : 'index',
            'params' => 2
        ));

        $router->add('/' . $moduleName . '/api/:controller/:action/:params', array(
            'namespace' => $module['namespace']['apiController'],
            'module' => $moduleName,
            'controller' => 1,
            'action' => 2,
            'params' => 3
        ));
    } else {
        $customRouting = APP_PATH . '/modules/' . $moduleName . '/config/router.php';

        if (file_exists($customRouting) && is_file($customRouting)) {
            include $customRouting;
        }
    }
}


$router->handle($container->get('request_uri'));
