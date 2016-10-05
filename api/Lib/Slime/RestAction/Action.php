<?php


namespace App\Lib\Slime\RestAction;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class Action
{
    protected $args;
    protected $request;
    protected $response;

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

    public function run()
    {
        $this->init();
        $this->performChecks();
        $this->performAction();
        $this->performCallBack();
        return $this->response;
    }

    protected abstract function init();
    protected abstract function performChecks();
    protected abstract function performAction();
    protected abstract function performCallBack();

}
