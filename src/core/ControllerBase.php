<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 08/02/2017
 * Time: 17:04
 */

namespace LightPHP\Core;
use LightPHP\Core\Core;

class ControllerBase
{

    protected $view = null;

    public function setView($view){
        return $this->view = new View($view);
    }

    public function getServiceLocator(){
        return Core::getServiceLocator();
    }

}