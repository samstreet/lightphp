<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 12/06/2016
 * Time: 20:01
 */

namespace LightPHP\Exceptions;

use JsonSerializable;


class ClassNotFoundException extends \Exception implements JsonSerializable
{

    public function __construct($message, $code, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    function jsonSerialize()
    {
        return array(
            "message" => $this->getMessage(),
            "code" => $this->getCode()
        );
    }


}