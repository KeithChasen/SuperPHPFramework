<?php
namespace Framework;

class Router

{
    private $routes;
    private $urlParsed;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function parse($url)
    {
        foreach ($this->routes as $pattern => $path) {

            if (preg_match("~$pattern~", $url)) {

                $internalRoute = preg_replace("~$pattern~", $path, $url);
                $segments = explode('/', $internalRoute);

                $this->urlParsed = array(
                    'controller' => $segments[0],
                    'action' => isset($segments[1]) ? $segments[1] : 'index',
                );
                $this->urlParsed['params'] = array_slice($segments, 2);
            }
        }
        return ($this->urlParsed);
    }

}