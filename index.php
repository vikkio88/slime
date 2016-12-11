<?php
require_once("vendor/autoload.php");


use App\Lib\Helpers\Config;
use App\Lib\Helpers\RouteLoader;
use Slim\App;
use Slim\Container;

$api = new App(
    new Container(Config::get('app.boot'))
);

// Here you can add all the middleware
$api->add(
    new RKA\Middleware\IpAddress()
);
$api->add(
    new \CorsSlim\CorsSlim()
);

$routes = RouteLoader::load();
foreach ($routes as $route) {
    require_once($route);
}

$api->run();