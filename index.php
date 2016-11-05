<?php


require_once("vendor/autoload.php");

use App\Actions\User\UserGetAll;
use App\Actions\Ping\PingGet;
use App\Lib\Helpers\Config;
use Slim\App;
use Slim\Container;

$api = new App(
    new Container(Config::get('app.boot'))
);

$api->get('/ping', function ($request, $response, $args) {
    return (
    new PingGet(
        $request,
        $response,
        $args
    )
    )->execute();
});

$api->get('/users', function ($request, $response, $args) {
    return (
    new UserGetAll(
        $request,
        $response,
        $args
    )
    )->execute();
});

$api->run();