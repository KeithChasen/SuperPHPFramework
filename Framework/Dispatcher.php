<?php
namespace Framework;

use Controllers\Error;

class Dispatcher
{
    public function dispatch($routerArray)
    {
        $controller = $routerArray['controller'];
        $action = $routerArray['action'];
        $params = $routerArray['params'];
        $view = null;

        $controller = ucfirst($controller);

        $controllerPath = ROOT . 'application/controllers/' . $controller . ".php";

        if (file_exists($controllerPath)) {

            $class = 'Controllers\\' . $controller;

            if (class_exists($class)) {
                $object = new $class();

                if (method_exists($object, $action)) {
                    if (!empty($params) && $params != null) {
                        $view = call_user_func_array([$object, $action], $params);
                    } else {
                        $view = $object->$action();
                    }

                } else {
                    throw new \Exception("Method " . $action . " is not exist in controller " . $controller);
                }

            } else {
                throw new \Exception("Class " . $class . " is not exists");
            }

        } else {
            throw new \Exception("File " . $controllerPath . " is not exist");
        }

        return $view;
    }

}
