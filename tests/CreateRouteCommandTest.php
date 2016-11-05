<?php

use App\Lib\Slime\Console\Commands\CreateRouteCommand;

class CreateRouteCommandTest extends PHPUnit_Framework_TestCase
{
    private $name = 'testentity';
    private $routesPath = 'routes/';
    private $filesCreated = [];

    public function tearDown()
    {
        foreach ($this->filesCreated as $file) {
            unlink($file);
        }
        rmdir($this->routesPath . $this->name);
    }

    /**
     * @group Novice
     * @group Commands
     * @group CreateRoute
     */
    public function testItCreatesARouteFile()
    {
        $command = new CreateRouteCommand([$this->name]);
        $result = $command->run();
        $this->assertEquals(0, $result);
        $files = glob($this->routesPath . $this->name . '/routes.php');
        $this->assertNotEmpty($files);
        $this->filesCreated = array_merge($this->filesCreated, $files);
    }

}
