<?php


namespace App\Lib\Slime\RestAction;


use App\Lib\Helpers\Responder;
use App\Lib\Slime\Exceptions\SlimeException;
use App\Lib\Slime\RestAction\UseCase\Action;

abstract class ApiAction extends Action
{
    protected $code;
    protected $message;
    protected $payload;
    protected $pagination = null;

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
        $bodyContent = $this->buildBody();

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

    private function buildBody()
    {
        $body = [
            'code' => $this->code,
            'message' => $this->message,
            'payload' => $this->payload
        ];

        if (!empty($this->pagination)) {
            $body['pagination'] = $this->pagination;
        }
        return json_encode($body);
    }
}