<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 12/06/2016
 * Time: 19:55
 */

namespace LightPHP;

use LightPHP\Exceptions\InvalidRouteCollectionException;
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
    public function add($name, $route, $class = null){
        $this->routes[$name] = $route;

        if(false === is_null($class)){
            $this->methods[$name] = $class;
        }
    }

    public function dispatch(){
        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "/";

        $matchedRoute = null;
        $matchedClass = null;

        foreach ($this->routes as $key => $route) {
            if(preg_match("#^$route$#", $uri)){
                $matchedRoute = $this->routes[$key];

                if(array_key_exists($key, $this->methods)){
                    $matchedClass = $this->methods[$key];
                } else {
                    $matchedClass = "Index";
                }
            }
        }

        return $matchedClass();
    }


    public function validateRoute($route)
    {
        // TODO: Implement validateRoute() method.
    }


}