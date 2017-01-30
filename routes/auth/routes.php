<?php

use App\Actions\User\Login\TokenLogin;

$api->get('/auth/{token}', function ($request, $response, $args) {
    return (
    new TokenLogin(
        $request,
        $response,
        $args
    ))->execute();
});