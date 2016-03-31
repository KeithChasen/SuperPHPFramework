<?php

class Autoloader
{
    private $namespaces;

    public function __construct()
    {
        $this->namespaces = require '../application/configs/namespaces.php';
    }

    public function load($class)
    {
        $prefix = $class;

        $positionOfLastSlash = strrpos($prefix, '\\');
        $prefix = substr($prefix, 0, $positionOfLastSlash);

        $className = substr($class, $positionOfLastSlash + 1);

        $path = $this->namespaces[$prefix];

        $file = $path . $className . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
}

spl_autoload_register([new Autoloader, 'load']);
