<?php
namespace Keith;

class Router
{
    public function route(Request $request)
    {
        //getting Controller
            $controller = $request->getController();
            echo $controller . "<br>";

        //getting Action
        $action = $request->getAction();
        echo $action . "<br>";

        //getting params
        $params = $request->getParams();
        echo "<pre>" . print_r($params, 1) . "</pre>";

    }
}