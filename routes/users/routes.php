<?php
use App\Actions\User\UserGetAll;


$api->get('/users', UserGetAll::class);


