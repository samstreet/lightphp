<?php

namespace LightPHP\MVC\Controller;

use LightPHP\Core\Core;
use LightPHP\Core\View;
use LightPHP\Core\ControllerBase;

class IndexController extends ControllerBase
{
    public function indexAction(){
        return $this->view;
    }
}