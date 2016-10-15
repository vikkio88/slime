<?php


use App\Lib\Helpers\Responder;
use Psr\Http\Message\ResponseInterface;
use Tests\Helpers\Stubs\ResponseStub;

class ResponderTest extends PHPUnit_Framework_TestCase
{

    /**
     * @group Helpers
     * @group Responder
     */
    public function testResponderReturnsExpectedInterface()
    {
        $responseObject = new ResponseStub();
        $response = Responder::getResponse("bodyContent", $responseObject);
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    /**
     * @group Helpers
     * @group Responder
     * @group responderjson
     */
    public function testResponderJsonReturnsExpectedHeader()
    {
        $responseObject = new ResponseStub();
        $response = Responder::getJsonResponse("bodyContent", $responseObject);
        $this->assertNotEmpty($response->getHeaders());
        $this->assertArrayHasKey("Content-Type", $response->getHeaders());
        $this->assertEquals("application/json", $response->getHeaders()['Content-Type']);
    }

    /**
     * @group Helpers
     * @group Responder
     * @group responderjsonbody
     */
    public function testResponderJsonReturnsExpectedBody()
    {
        $responseObject = new ResponseStub();
        $response = Responder::getJsonResponse("bodyContent", $responseObject);
        $this->assertNotEmpty($response->getBody());
    }

}
