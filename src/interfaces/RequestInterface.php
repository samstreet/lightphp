<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 08/02/2017
 * Time: 21:11
 */

namespace LightPHP\Interfaces;


interface RequestInterface
{
    public function getHeaders();
    public function getQuery();
    public function getPost();
}