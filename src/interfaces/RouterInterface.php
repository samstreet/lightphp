<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 17/06/2016
 * Time: 17:08
 */

namespace LightPHP\Interfaces;


interface RouterInterface
{
    
    public function parseRoute($url);
    
    public function formatRoute($url);

    public function parseRoutes($routeCollection);

    public function validateRoutes($routes);

    public function validateRoute($route);

}