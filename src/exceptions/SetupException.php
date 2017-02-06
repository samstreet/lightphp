<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 06/02/2017
 * Time: 20:53
 */

namespace LightPHP\Exceptions;


class SetupException extends \Exception
{
    public function __construct()
    {
        parent::__construct("An Error Occurred During Setup");
    }
}