<?php


namespace Tests\Helpers\Stubs;


use App\Actions\ApiAction;

class ApiActionStub extends ApiAction
{

    protected function performAction()
    {
        $this->payload = "settingSomeData";
    }
}