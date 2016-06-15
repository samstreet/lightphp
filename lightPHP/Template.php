<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 12/06/2016
 * Time: 19:55
 */

namespace Library\MVC;


class Template
{

    protected $_variables = array(),
        $_controller,
        $_action,
        $_bodyContent;

    public    $viewPath,
        $section = array(),
        $layout;

    public function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
        // we set the configuration variables to local variables for rendering
        global $cfg;
        $this->set('cfg',$cfg);
    }

    /**
     * Set Variables
     */
    public function set($name, $value) {
        $this->_variables[$name] = $value;
    }

    /**
     * set action
     */
    public function setAction($action){
        $this->_action = $action;
    }

    /**
     * RenderBody
     */
    public function renderBody(){
        // if we have content, then deliver it
        if(!empty($this->_bodyContent)){
            echo $this->_bodyContent;
        }
    }

    /**
     * RenderSection
     */
    public function renderSection($section){
        if(!empty($this->section) && array_key_exists($section, $this->section)){
            echo $this->section[$section];
        }
    }

    /**
     * Display Template
     */
    public function render() {
        // extract the variables for view pages
        extract($this->_variables);
        // the view path
        $path = MyHelpers::UrlContent('~/views/');
        // start buffering
        ob_start();
        // render page content
        if(empty($this->viewPath)){
            include ($path . $this->_controller . DS . $this->_action . '.php');
        }else{
            include ($this->viewPath);
        }
        // get the body contents
        $this->_bodyContent = ob_get_contents();
        // clean the buffer
        ob_end_clean();
        // check if we have any layout defined
        if(!empty($this->layout) && (!MyHelpers::isAjax())){
            // we need to check the path contains app prefix (~)
            $this->layout = MyHelpers::UrlContent($this->layout);
            // start buffer (minify pages)
            ob_start('MyHelpers::minify_content');
            // include the template
            include($this->layout);
        }else{
            ob_start('MyHelpers::minify_content_js');
            // just output the content
            echo $this->_bodyContent;
        }
        // end buffer
        ob_end_flush();
    }

    /**
     * return the renderred html string
     */
    public function __toString(){
        $this->render();
        return '';
    }

}