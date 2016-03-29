<?php
ini_set('display_errors', E_ALL);

//use Framework;
require "../BadAutoloader/Autoloader.php";

$autoloader = new Autoloader();
spl_autoload_register([$autoloader, 'load']);

$request = new Framework\Request();
