<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 08/02/2017
 * Time: 17:26
 */

namespace LightPHP\Core;


class View
{
    private $data = array();

    private $render = FALSE;

    public function __construct($template = null)
    {
        if(null === $template){
            $this->render = $this->redirectTo404();
        }

        try {
            $file = __DIR__ . "/../MVC/View/" . $template . ".phtml";
            if (file_exists($file)) {
                $this->render = file_get_contents($file);
            } else {
                throw new \Exception("");
            }
        }
        catch (\Exception $e) {
            $this->render = $this->redirectTo404();
        }

    }

    public function redirectTo404(){
        return __DIR__ . "/../MVC/View/error/404.phtml";
    }

    public function assign($variable, $value)
    {
        $this->data[$variable] = $value;
    }

    public function getBody(){
        return $this->render;
    }

    public function __destruct()
    {

    }
}