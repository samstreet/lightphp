<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 12/06/2016
 * Time: 19:55
 */

namespace LightPHP;

use LightPHP\Core\View;
use LightPHP\Exceptions\InvalidRouteCollectionException;
use \LightPHP\Exceptions\RouteNotFoundException;
use LightPHP\Interfaces\RouterInterface;


class Router implements RouterInterface
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
                if(is_callable($this->methods[$key])) call_user_func($this->methods[$key]);

                if(is_array($this->methods[$key]) || $this->methods[$key] instanceof Traversable){
                        $controller = $this->methods[$key]['controller'];
                        $action = $this->methods[$key]['action'];
                        $view = new View($this->methods[$key]['view']);

                        return $view;
                }
            }

            return new View();
        }
    }


    public function validateRoute($route)
    {
        // TODO: Implement validateRoute() method.
    }


}