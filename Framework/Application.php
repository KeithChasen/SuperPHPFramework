<?php
namespace Framework;

class Application
{

    public function process()
    {
        $dispatcher = new Dispatcher();
        $router = new Router(Config::getInstance()->getConfig('routes'));
        $uri = Request::singletone()->getUri();
        $routerArr = $router->parse($uri);
        $params = array_merge($routerArr['params'], $_POST);
        Request::singletone()->setParams($params);
        return $dispatcher->dispatch($routerArr);
    }
}

