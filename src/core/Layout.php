<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 10/02/2017
 * Time: 17:20
 */

namespace LightPHP\Core;


class Layout
{
    private $content;
    private $render;

    function __construct($template, $content = null)
    {
        try {
            $file = __DIR__ . "/../layout/" . $template . ".phtml";
            if (file_exists($file)) {
                $this->content = $content;
                $this->render = $file;
            } else {
                throw new \Exception("");
            }
        }
        catch (\Exception $e) {
            die("ball");
        }

    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function __destruct()
    {
        extract((array) $this->content);
        include($this->render);
    }


}