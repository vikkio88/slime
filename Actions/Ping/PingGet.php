<?php


namespace App\Actions\Ping;


use App\Lib\Slime\RestAction\ApiAction;

class PingGet extends ApiAction
{
    protected function performAction()
    {
        $this->payload = "Pong";
    }
}