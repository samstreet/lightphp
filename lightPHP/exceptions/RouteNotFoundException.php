<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 17/06/2016
 * Time: 17:18
 */

namespace LightPHP\Exceptions;


class RouteNotFoundException extends \Exception
{

    public function __construct()
    {
        parent::__construct("No Route Found");
    }

}