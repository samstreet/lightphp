<?php

namespace LightPHP;

return [
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
        ],
        [
            'method' => ['GET'],
            'name' => 'about',
            'route' => '/about',
            'callable' => function(){
                die('about'); // depreceated
            }
        ]
    ],
    'services' => [
        'core_service' => 'LightPHP\Services\CoreService'
    ],
    'database' => [
        // any database logic here
    ]
];