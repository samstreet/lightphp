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
        $layout = Core::getLayout();
        $view = new View($view);
        $layout->setContent($view->getBody());
        return $this->view = $layout;
    }

    public function getServiceLocator(){
        return Core::getServiceLocator();
    }

}