<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 18/06/2016
 * Time: 15:52
 */

namespace LightPHP;


class LightPHP
{

    protected $config = array();

    protected $router;

    public function __construct($config)
    {
        $this->config = $config;
        $this->router = new Router();
        $this->router->addRoutes($this->config["routes"]);
    }

    public function run()
    {
        $this->router->dispatch();
    }
}