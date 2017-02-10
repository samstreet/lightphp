<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 17/06/2016
 * Time: 17:30
 */

namespace LightPHP\Core;


class Route
{
    protected $name;

    protected $method = array();

    protected $callable;

    protected $identifier;

    protected $pattern;

    public function __construct($method, $name, $pattern, $callable)
    {
        $this->name = $name;
        $this->method = $method;
        $this->pattern = $pattern;
        $this->callable = $callable;
        $this->identifier = "route_".$name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getCallable()
    {
        return $this->callable;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return mixed
     */
    public function getPattern()
    {
        return $this->pattern;
    }



}