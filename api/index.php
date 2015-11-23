<?php
require_once("../vendor/autoload.php");

$api = new \Slim\Slim();

$api->response->headers->set('Content-Type', 'application/json');

$api->get('/ping', function () {
    echo json_encode(
        [
            "status" => "service up",
            "message" => "in a bottle",
            "config" => \App\Lib\Helpers\Config::get("config1.stuff")
        ]
    );
});
$api->run();