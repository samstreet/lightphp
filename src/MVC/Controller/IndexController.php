<?php

namespace LightPHP\MVC\Controller;

use LightPHP\Core\View;
use LightPHP\Core\ControllerBase;

class IndexController extends ControllerBase
{
    public function indexAction(){
        $this->view->assign("test", "hello");
        return $this->view;
    }
}