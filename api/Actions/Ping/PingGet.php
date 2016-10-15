<?php


namespace App\Actions\Ping;


use App\Actions\ApiAction;

class PingGet extends ApiAction
{
    protected function performAction()
    {
        $this->payload = "Pong";
    }
}