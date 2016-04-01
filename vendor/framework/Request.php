<?php
namespace Keith;

class Request
{
    private $controller;

    private $action;

    private $params;

    /*TODO:*/

    /**
     * method getPathInfo()
     *
     * getting request path
     */

    public function getPathInfo()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uriArray = explode('/', $uri);
        $uriArray = array_filter($uriArray);


            $this->controller = ($controller = array_shift($uriArray)) ? $this->controller = $controller : 'index';
            $this->action     = ($action = array_shift($uriArray)) ? $this->action = $action : "index";
            $this->params     = ($params = $uriArray) ? $this->params = $params : null;
    }

    /**
     * method find(key)
     *
     * searching for request parameter by key
     */

    public function find($key)
    {
        if ( key_exists($key, $_REQUEST)){
            return $_REQUEST[$key];
        } else {
            return null;
        }

    }

    /**
     * has(key)
     */

    public function has($key)
    {
        return key_exists($key, $_REQUEST);
    }

    /**
     * GETTERS
     */

    /**
     * method getController()
     */

    public function getController()
    {
        return $this->controller;
    }

    /**
     * method getAction
     */

    public function getAction()
    {
        return $this->action;
    }

    /**
     * method getParams
     */

    public function getParams()
    {
        return $this->params;
    }
}