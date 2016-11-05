<?php
use App\Actions\User\UserGetAll;


$api->get('/users', function ($request, $response, $args) {
    return (
    new UserGetAll(
        $request,
        $response,
        $args
    )
    )->execute();
});


