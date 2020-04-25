<?php
declare(strict_types=1);

use Dotenv\Dotenv;

error_reporting(E_ALL);
ini_set('display_errors', 'true');

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

require __DIR__ . '/../vendor/autoload.php';
require_once APP_PATH . '/Bootstrap.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$app = new Bootstrap();
$app->init();
