<?php


namespace Tests\Helpers\Stubs;


use App\Actions\ApiAction;
use App\Lib\Slime\Exceptions\SlimeException;

class ApiActionExceptionStub extends ApiAction
{

    protected function performAction()
    {
        throw new SlimeException("Self-destruction triggered", 500);
    }
}