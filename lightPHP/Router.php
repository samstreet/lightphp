<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 12/06/2016
 * Time: 19:55
 */

namespace LightPHP;


class Router
{

    protected $routes = array();


    public function __construct($routes){
        $this->routes = $routes;
    }

    public function add($type, $route, callable $callback){
        try{

        }catch (\Exception $e){

        }
    }

    public function validate($type, $route, callable $callback){
        $validated = false;
        
        return $validated;
    }

    public function validateType($type){
        $allowed = ["GET", "POST", "PUT", "PATCH", "DELETE"];

        $type = strtoupper($type);

        if(in_array($type, $allowed)){
            return true;
        }

        return false;
    }

    public function validateRoute($route){
        return true;
    }

    public function validateCallable(){
        return true;
    }

    public function dispatch(){
        return true;
    }

    public function matchRoute(){
        return;
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }



}