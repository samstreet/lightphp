<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 10/02/2017
 * Time: 08:03
 */

namespace LightPHP\Core;


class Autoloader
{
    static public function loader($className){
        chdir("../src");
        var_dump($className);
        $filename = str_replace('\\', '/', $className) . ".php";

        if(file_exists($filename)){
            include($filename);
            if(class_exists($className)){
                return true;
            }
        }

        return false;
    }

}

spl_autoload_register('LightPHP\Core\Autoloader::loader');