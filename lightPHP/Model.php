<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 12/06/2016
 * Time: 19:54
 */

namespace Library\MVC;


class Model
{

    protected $_model;
    public $db, $controller;

    /**
     * Constructor for Model
     *
     */
    public function __construct($db) {
        $this->db = $db;
        $this->_model = get_class($this);
        $defaultModel = ($this->_model=='Model');

        if(!$defaultModel){
            $this->table = preg_replace('/Model$/', '', $this->_model);// remove ending Model
        }

        $this->init();
    }

    protected function init(){
        /* Put your code here*/
    }

}