<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 12/06/2016
 * Time: 19:55
 */

namespace LightPHP\Core;

use LightPHP\Exceptions\ClassNotFoundException;
use LightPHP\Exceptions\InvalidRouteCollectionException;

class Router
{

    protected $routes = [];
    protected $methods = [];
    protected $allowedMethods = [];

    protected $base = "";

    public function __construct($base = null)
    {
        $this->base = is_null($base) ? $_SERVER["HTTP_HOST"] : $base;
    }

    /**
     * @param $route string
     * @param $method string
     */
    public function add($methods, $name, $route, $callable){
        $this->routes[$name] = $route;
        $this->methods[$name] = $callable;
        $this->allowedMethods[$name] = $methods;
    }

    public function addRoutes($routes)
    {
        if(!is_array($routes)){
            throw new InvalidRouteCollectionException();
        }

        foreach($routes as $route){
            $this->add($route["method"], $route["name"], $route["route"], $route["callable"]);
        }
    }

    public function dispatch(){
        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "/";

        foreach ($this->routes as $key => $route) {

            if(preg_match("#^$route$#", $uri)){
                if(is_array($this->methods[$key]) || $this->methods[$key] instanceof Traversable){
                        $controller = $this->methods[$key]['controller'];
                        $action = $this->methods[$key]['action'];

                        if(class_exists($this->methods[$key]['controller'])){
                            $controller = new $controller();
                            $action = $action."Action";

                            if(method_exists($controller, $action)){
                                $controller->setView($this->methods[$key]['view']);
                                return $controller->$action();
                            }
                        }

                        throw new ClassNotFoundException("Error loading:" . $this->methods[$key]['controller'], 500);
                }
            }
        }

        return new View(); // 404 by default
    }
}