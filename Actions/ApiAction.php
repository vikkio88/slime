<?php


namespace App\Actions;


use App\Lib\Helpers\Responder;
use App\Lib\Slime\Exceptions\SlimeException;
use App\Lib\Slime\RestAction\Action;

abstract class ApiAction extends Action
{
    protected $code;
    protected $message;
    protected $payload;

    protected function init()
    {
        $this->code = 200;
        $this->message = "OK";
        $this->payload = null;
    }

    protected function performChecks()
    {

    }

    protected function performCallBack()
    {

    }

    protected function formatResponse()
    {
        $bodyContent = json_encode(
            [
                'code' => $this->code,
                'message' => $this->message,
                'payload' => $this->payload
            ]
        );

        $this->response = Responder::getJsonResponse(
            $bodyContent,
            $this->response
        );
    }

    protected function manageSlimeException(SlimeException $slimeException)
    {
        $this->manageBaseException($slimeException);
    }

    protected function manageBaseException(\Exception $baseException)
    {
        $this->code = $baseException->getCode();
        $this->message = $baseException->getMessage();
    }
}