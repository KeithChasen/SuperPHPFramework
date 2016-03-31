<?php
namespace Keith;

class Request
{
    public function __construct()
    {
        echo "URI: " . $this->getUri();
    }

    private function getUri()
    {
        $uri = $_SERVER['REQUEST_URI'];
        return $uri;
    }
}