<?php

class Autoloader
{
    private $path;

    private $namespaces;

    public function __construct()
    {
        $this->namespaces = require 'paths.php';
    }

    public function load($class)
    {
        $namespaceAndClass = explode("\\", $class);

        $prefix = array_shift($namespaceAndClass);

        foreach ($this->namespaces as $pattern => $folder)
        {
            if (preg_match("~$pattern~", $prefix))
            {
                $this->path = $folder;
            }
        }

        $file = $this->path . implode('/', $namespaceAndClass) . '.php';

        if (file_exists($file))
        {
            require_once $file;
        }

    }
}