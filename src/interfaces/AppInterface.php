<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 19/06/2016
 * Time: 10:50
 */

namespace LightPHP\Interfaces;


interface AppInterface
{
    /**
     * @param $config array
     * @throws InvalidConfigurationFileException
     * @return bool
     */
    public function validateConfig($config);

}