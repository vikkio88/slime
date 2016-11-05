<?php
use App\Actions\Ping\PingGet;

$api->get('/ping', function ($request, $response, $args) {
    return (
    new PingGet(
        $request,
        $response,
        $args
    )
    )->execute();
});


