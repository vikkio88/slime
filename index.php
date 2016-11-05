<?php
require_once("vendor/autoload.php");


use App\Lib\Helpers\Config;
use App\Lib\Helpers\RouteLoader;
use Slim\App;
use Slim\Container;

$api = new App(
    new Container(Config::get('app.boot'))
);

$routes = RouteLoader::load();
foreach ($routes as $route) {
    require_once($route);
}

$api->run();