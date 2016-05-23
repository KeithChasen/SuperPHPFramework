<?php
namespace Framework;

class Request
{

    private $params;

    private static $instance;

    public static function singletone()
    {
        if (!self::$instance) {
            self::$instance = new Request();
        }
        return self::$instance;
    }

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }


    /**
     * Return parameters
     *
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Sets parameters
     * @param $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    public static function getUri()
    {
        $uri = null;
        if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = $_SERVER['REQUEST_URI'];
        }
        $uri = trim($uri, '/');
        return $uri;
    }
}
