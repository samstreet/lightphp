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

    protected $namedRoutes = array();

    protected $base = "";

    public function __construct($routes, $base = null){
        //$this->routes = $this->validateRoutes($routes) ? $routes : [];
        $this->base = is_null($base) ? $_SERVER["HTTP_HOST"] : $base;

        $this->addRoutes($routes);
    }

    public function addRoutes($routes){
        foreach($routes as $route) {
            call_user_func_array(array($this, 'map'), $route);
        }
    }

    public function map($name, $type, $route, callable $callback){
        try{
            $this->routes[] = new Route($type, $name, $route, $callback);

        }catch (\Exception $e){

        }
    }

    public function match($name, $url = null){
        if(is_null($url)){
            $url = $_SERVER["REQUEST_URI"];
        }

        if(isset($this->routes[$name])){
            die("route match");
        }

        $route = str_replace("/", "_", $url);


        

    }

    public function dispatch(){
        return true;
    }

    /**
     * @return array
     */
    public function getNamedRoutes()
    {
        return $this->namedRoutes;
    }

    /**
     * @param array $namedRoutes
     */
    public function setNamedRoutes($namedRoutes)
    {
        $this->namedRoutes = $namedRoutes;
    }



    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    public function parseRoute($url)
    {
        // TODO: Implement parseRoute() method.
    }

    public function formatRoute($url)
    {
        // TODO: Implement formatRoute() method.
    }

    public function parseRoutes($routeCollection)
    {
        // TODO: Implement parseRoutes() method.
    }

    public function validateRoutes($routes)
    {
        try{
            if(!is_array($routes) && !$routes instanceof Traversable){
                throw new InvalidRouteCollectionException();
            }

            return true;

        }catch (InvalidRouteCollectionException $ex){
            return false;
        }

        return false;

    }

    public function validateRoute($route)
    {
        // TODO: Implement validateRoute() method.
    }


}