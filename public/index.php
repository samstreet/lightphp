<?php

use \LightPHP\LightPHP;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('ROOT', "/var/www/lightphp/");

include __DIR__ . '/../init_autoloader.php';

try {
    $app = new LightPHP([]);
    $app->run();
} catch(\Exception $exception){
    die(var_dump($exception->getMessage()));
}