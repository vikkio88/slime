<?php


require_once("vendor/autoload.php");

use App\Actions\User\UserGetAll;
use App\Actions\Ping\PingGet;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$api = new \Slim\App($c);

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