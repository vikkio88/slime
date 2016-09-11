<?php


require_once("vendor/autoload.php");

use \App\Lib\Helpers\Responder;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$api = new \Slim\App($c);

$api->get('/ping', function ($request, $response, $args) {
    $jsonResp = json_encode(
        [
            "status" => "service up",
            "message" => "in a bottle"
        ]
    );
    return Responder::getJsonResponse($jsonResp, $response);
});

$api->get('/users', function ($response) {
    return Responder::getJsonResponse(
        \App\Models\User::all(),
        $response
    );
});

$api->run();