<?php


namespace Tests\Helpers\Stubs;


use App\Lib\Slime\Exceptions\SlimeException;
use App\Lib\Slime\RestAction\ApiAction;

class ApiActionExceptionStub extends ApiAction
{

    protected function performAction()
    {
        throw new SlimeException();
    }
}