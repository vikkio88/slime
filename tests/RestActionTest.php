<?php


use App\Lib\Slime\Interfaces\UseCase\IAction;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Tests\Helpers\Stubs\ResponseStub;

class RestActionTest extends PHPUnit_Framework_TestCase
{

    /**
     * @group SlimeLibs
     * @group RestAction
     */
    public function testUsingCorrectIFace()
    {
        $action = new \Tests\Helpers\Stubs\ActionStub();
        $this->assertInstanceOf(IAction::class, $action);
    }

    /**
     * @group SlimeLibs
     * @group RestAction
     */
    public function testReturningCorrectIFace()
    {
        $action = new \Tests\Helpers\Stubs\ActionStub(
            $this->getMock(RequestInterface::class),
            new ResponseStub(),
            []
        );
        $result = $action->execute();
        $this->assertInstanceOf(ResponseInterface::class, $result);
    }

}