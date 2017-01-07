<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 07/01/2017
 * Time: 16:42
 */

namespace LightPHP\Core;


/**
 * Class Core
 * Handles all core logic
 * @package LightPHP\Core
 */
class Core
{
    /**
     * Return the default config
     * @return mixed
     */
    public static function getConfig(){
        return include __DIR__  . "/../../config/config.php";
    }
}