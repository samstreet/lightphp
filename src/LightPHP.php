<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 18/06/2016
 * Time: 15:52
 */

namespace LightPHP;

use LightPHP\Interfaces\AppInterface;

class LightPHP implements AppInterface
{

    protected $config = array();

    protected $router;

    public function __construct($config)
    {
        try{
            $this->config = $this->validateConfig($config);
            $this->setUp();
        } catch (\Exception $e) {
            die(var_dump($e->getMessage()));
        }
    }

    public function setUp()
    {
        $this->router = new Router();
        $this->router->addRoutes($this->config["routes"]);
    }

    public function run()
    {
        $this->router->dispatch();
    }


    #######################################
    ## Start Interface methods
    #######################################

    public function validateConfig($config)
    {
        if(!is_array($config) && !$config instanceof Traversable){
            throw new \LightPHP\Exceptions\InvalidConfigurationFileException();
        }

        return $config;
    }

    #######################################
    ## End Interface methods
    #######################################

}