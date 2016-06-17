<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 17/06/2016
 * Time: 17:21
 */

namespace LightPHP\Exceptions;


class InvalidRouteCollectionException extends \Exception
{

    public function __construct()
    {
        parent::__construct("Routes must be array or Traversable");
    }

}