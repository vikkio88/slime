<?php

use App\Actions\User\Login\TokenLogin;

$api->get('/auth/{token}', TokenLogin::class);