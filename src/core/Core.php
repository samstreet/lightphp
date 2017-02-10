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
    protected static $_serviceLocator = null;
    protected static $_layout = null;

    /**
     * Return the default config
     * @return mixed
     */
    public static function getConfig(){
        return include __DIR__  . "/../../config/config.php";
    }

    public static function setServiceLocator($services){

        $registry = new ServiceRegistry();

        foreach($services as $key => $service){
            $registry->set($key, new $service());
        }

        self::$_serviceLocator = new \LightPHP\Core\ServiceLocator($registry);

    }
    public static function getServiceLocator(){
        return self::$_serviceLocator;
    }

    public function getCoreService(){
        return $this->getServiceLocator()->get("core_service");
    }

    /**
     * @return null
     */
    public static function getLayout()
    {
        return self::$_layout;
    }

    /**
     * @param null $layout
     */
    public static function setLayout($layout)
    {
        self::$_layout = $layout;
    }


}