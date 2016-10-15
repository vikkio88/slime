<?php


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Tests\Helpers\Stubs\ApiActionExceptionStub;
use Tests\Helpers\Stubs\ApiActionStub;
use Tests\Helpers\Stubs\ResponseStub;

class ApiActionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @group App
     * @group ApiAction
     */
    public function testThatSettingSomeDataItWillGiveItBack()
    {
        $apiAction = new ApiActionStub(
            $this->getMock(RequestInterface::class),
            new ResponseStub(),
            []
        );

        $response = $apiAction->execute();
        $this->assertInstanceOf(StreamInterface::class, $response->getBody());
        $body = $response->getBody()->__toString();
        $this->assertNotEmpty($body);
    }

    /**
     * @group App
     * @group ApiAction
     * @group ApiActionException
     */
    public function testThatThrowingAnExceptionWillBeCatchAndFormatted()
    {
        $apiAction = new ApiActionExceptionStub(
            $this->getMock(RequestInterface::class),
            new ResponseStub(),
            []
        );
        $response = $apiAction->execute();
        $this->assertInstanceOf(StreamInterface::class, $response->getBody());
        $body = $response->getBody()->__toString();
        $this->assertNotEmpty($body);
        $code = 500;
        $jsonBody = json_decode($body);
        $this->assertEquals($code, $jsonBody->code);
    }


}
