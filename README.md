# Lightphp

## About
A lightweight PHP framework built with scalability in mind.

## How to use
Framework comes pre loaded with an index route and a core service.

### Start
 - Composer install to autoload the required files
 - Vagrant up from project route
 - Navigate to ```http://127.0.0.1:8080/```
 - Enjoy

### Create config file (config/config.php:
 - routes
 - services
 
 ```php
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
    ],
    'services' => [
        'core_service' => 'LightPHP\Services\CoreService'
    ],
];
```

## Future Updates
 - Unit testing
 - Performance improvements
 - Check availble methods for a route
 - Authorization


