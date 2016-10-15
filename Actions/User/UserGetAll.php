<?php


namespace App\Actions\User;


use App\Actions\ApiAction;
use App\Models\User;

class UserGetAll extends ApiAction
{

    protected function performAction()
    {
        $this->payload = User::all();
    }
}