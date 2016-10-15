<?php


namespace App\Lib\Slime\Interfaces\UseCase;


use Psr\Http\Message\ResponseInterface;

interface IAction
{
    /**
     * @return ResponseInterface
     */
    public function execute();
}