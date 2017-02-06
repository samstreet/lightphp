<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 06/02/2017
 * Time: 20:51
 */

namespace LightPHP\Core;

use LightPHP\Interfaces\RegistrableInterface;

class ServiceLocator
{

    protected $_registryBackend;

    /**
     * Constructor
     */
    public function __construct(RegistrableInterface $registryBackend)
    {
        $this->_registryBackend = $registryBackend;
    }

    /**
     * Save the specified element to the registry
     */
    public function set($key, $value)
    {
        $this->_registryBackend->set($key, $value);
        return $this;
    }

    /**
     * Get the specified element from the registry
     */
    public function get($key)
    {
        return $this->_registryBackend->get($key);
    }

    /**
     * Clear the registry
     */
    public function clear()
    {
        $this->_registryBackend->clear();
    }

}