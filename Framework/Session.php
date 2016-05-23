<?php
namespace Framework;

class Session
{
    public $data;
    protected static $session = null;


    public static function getInstance()
    {
        if (!self::$session) {
            self::$session = new Session();
            session_start();
        }
        return self::$session;
    }

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function unSession()
    {
        self::$session = null;
    }

    public function get($key)
    {
        if (!empty($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return null;
        }

    }

    public function set($key, $data)
    {
        $_SESSION[$key] = $data;
    }
}