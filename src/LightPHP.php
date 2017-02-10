<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 18/06/2016
 * Time: 15:52
 */

namespace LightPHP;

use LightPHP\Core\Layout;
use LightPHP\Interfaces\AppInterface;
use LightPHP\Core\Core;
use LightPHP\Core\Router;

class LightPHP implements AppInterface
{

    protected $config = [];

    protected $router;

    protected $layout = "default";

    public function __construct($config)
    {
        try{
            $this->config = $this->validateConfig($config);
            $this->setUp();
        } catch (\Exception $e) {
            die(var_dump($e->getMessage())); // display a better error
        }
    }

    public function setUp()
    {
        try{
            $this->router = new Router();
            $this->router->addRoutes($this->config["routes"]);
            Core::setServiceLocator($this->config["services"]);
            $layout =  new Layout($this->layout);
            Core::setLayout($layout);
        }catch (\Exception $e){

        }

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
        $config = empty($config) ? Core::getConfig() : $config;
        if(!is_array($config) && !$config instanceof Traversable){
            throw new \LightPHP\Exceptions\InvalidConfigurationFileException();
        }

        return $config;
    }

    #######################################
    ## End Interface methods
    #######################################

}