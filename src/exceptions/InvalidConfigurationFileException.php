<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 19/06/2016
 * Time: 10:55
 */

namespace LightPHP\Exceptions;


class InvalidConfigurationFileException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Invalid configuration file. Config must be array or Transversable");
    }
}