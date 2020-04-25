<?php
declare(strict_types=1);

namespace ProjectName\Example;

use Phalcon\Di\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Config;


class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            __NAMESPACE__ . '\Controllers' => __DIR__ . '/controllers',
            __NAMESPACE__ . '\Controllers\Api' => __DIR__ . '/controllers/api',
            __NAMESPACE__ . '\Controllers\Web' => __DIR__ . '/controllers/web',
            __NAMESPACE__ . '\Models' => __DIR__ . '/models',
        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di)
    {
        if (file_exists(__DIR__ . '/config/config.php')) {

            $config = $di['config'];

            $override = include __DIR__ . '/config/config.php';

            if ($config instanceof Config) {
                $config->merge($override);
            } else {
                $config = $override;
            }
        }

        include_once __DIR__ . '/config/services.php';
    }
}
