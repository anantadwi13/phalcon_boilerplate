<?php

use Phalcon\Di\DiInterface;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

class Bootstrap extends Application
{
    public function __construct(DiInterface $container = null)
    {
        parent::__construct($container);
    }

    public function init()
    {
        try {
            $this->registerModules(require APP_PATH . '/config/modules.php');
            $this->registerServices();

            $this->handle($this->container->get('request_uri'))->send();
        } catch (\Exception $e) {
            echo $e->getMessage() . '<br>';
            echo '<pre>' . $e->getTraceAsString() . '</pre>';
        }
    }

    private function registerServices()
    {
        try {
            $container = new FactoryDefault();

            $config = include APP_PATH . "/config/config.php";

            include APP_PATH . '/config/loader.php';
            include APP_PATH . '/config/services.php';
            include APP_PATH . '/config/router.php';

            $this->setDI($container);
        } catch (\Exception $e) {
            echo $e->getMessage() . '<br>';
            echo '<pre>' . $e->getTraceAsString() . '</pre>';
        }
    }

}