<?php


namespace App\Lib\Slime\RestAction\UseCase;


use App\Lib\Slime\Exceptions\SlimeException;
use App\Lib\Slime\Interfaces\UseCase\IAction;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class Action implements IAction
{
    protected $args;
    protected $request;
    protected $response;

    protected $expectedQueryParameters = [

    ];

    public function __construct(
        RequestInterface $request = null,
        ResponseInterface $response = null,
        array $args = []
    )
    {
        $this->args = $args;
        $this->request = $request;
        $this->response = $response;
    }

    public function execute()
    {
        $this->init();
        try {
            $this->performChecks();
            $this->performAction();
            $this->performCallBack();
        } catch (SlimeException $slimeException) {
            $this->manageSlimeException($slimeException);
        } catch (\Exception $baseException) {
            $this->manageBaseException($baseException);
        }

        $this->formatResponse();
        return $this->response;
    }

    protected abstract function init();
    protected abstract function performChecks();
    protected abstract function performAction();
    protected abstract function performCallBack();
    protected abstract function formatResponse();
    protected abstract function manageSlimeException(SlimeException $slimeException);
    protected abstract function manageBaseException(\Exception $baseException);

}
