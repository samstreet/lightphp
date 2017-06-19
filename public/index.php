<?php

use LightPHP\LightPHP;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('ROOT', "/var/www/");

include ROOT . 'vendor/autoload.php';

$config = [
    'routes' => [
        [
            'method' => ['GET'],
            'name' => 'index',
            'route' => '/',
            'callable' => [
                'controller' => 'LightPHP\MVC\Controller\IndexController',
                'namespace' => 'LightPHP\MVC\Controller',
                'action' => 'index',
                'view' => 'index/index'
            ]
        ],
        [
            'method' => ['GET'],
            'name' => 'test',
            'route' => '/test',
            'callable' => [
                'controller' => 'LightPHP\MVC\Controller\TestController',
                'namespace' => 'LightPHP\MVC\Controller',
                'action' => 'index',
                'view' => 'test/index'
            ]
        ]
    ],
    'services' => [
        'core_service' => 'LightPHP\Services\CoreService'
    ],
    'database' => [
        // any database logic here
    ]
];

try {
    $app = new LightPHP($config);
    $app->run();
} catch(\Exception $exception){
    die(var_dump($exception->getMessage()));
}