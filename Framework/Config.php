<?php

namespace Framework;

class Config
{
    protected static $instance;
    public $configArray;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }


    public function getConfig($name)
    {

        $filePath = ROOT . 'application/configs/' . $name . '.php';
        if (file_exists($filePath)) {
            $data = require_once($filePath);
            return $data;
        }
    }
}
