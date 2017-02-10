<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 08/02/2017
 * Time: 21:19
 */

namespace LightPHP\Interfaces;


interface ResponseInterface
{
    public function getBody();
    public function setBody();
    public function getStatusCode();
}