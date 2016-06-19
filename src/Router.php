<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 12/06/2016
 * Time: 19:55
 */

namespace LightPHP;

use LightPHP\Exceptions\InvalidRouteCollectionException;
use \LightPHP\Exceptions\RouteNotFoundException;
use LightPHP\Interfaces\RouterInterface;


class Router implements RouterInterface
{

    protected $routes = array();
    protected $methods = array();

    protected $base = "";

    public function __construct($base = null)
    {
        $this->base = is_null($base) ? $_SERVER["HTTP_HOST"] : $base;
    }

    /**
     * @param $route string
     * @param $method string
     */
    public function add($name, $route, $callable){
        $this->routes[$name] = $route;
        $this->methods[$name] = $callable;
    }

    public function addRoutes($routes)
    {
        if(!is_array($routes)){
            throw new InvalidRouteCollectionException();
        }

        foreach($routes as $route){
            $this->add($route["name"], $route["route"], $route["callable"]);
        }
    }

    public function dispatch(){
        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "/";

        foreach ($this->routes as $key => $route) {
            if(preg_match("#^$route$#", $uri)){
                call_user_func($this->methods[$key]);
            }
        }
    }


    public function validateRoute($route)
    {
        // TODO: Implement validateRoute() method.
    }


}