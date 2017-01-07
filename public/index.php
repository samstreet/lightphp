<?php

use \LightPHP;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

chdir(dirname(__DIR__));

// to be used in conjunction with vendor
//include __DIR__ . '/../vendor/autoload.php';

try {
    $app = new LightPHP([]);
    die("ff");
    $app->run();
} catch(\Exception $exception){
    die(var_dump($exception->getMessage()));
}