<?php
ini_set('display_errors', E_ALL);

define('SITE_PATH', realpath(dirname(__FILE__)).'/');

//use Framework;
require "../vendor/Autoloader.php";

$request = new Keith\Request();
$request->getPathInfo();

$router = new \Keith\Router();
$router->route($request);

