<?php

use App\Lib\Helpers\TextFormatter;
use App\Lib\Slime\Console\Commands\CreateModelCommand;

class CreateModelCommandTest extends PHPUnit_Framework_TestCase
{
    private $name = 'model';
    private $modelPath = 'Models/';
    private $filesCreated = [];

    public function tearDown()
    {
        foreach ($this->filesCreated as $file) {
            unlink($file);
        }
    }

    /**
     * @group Novice
     * @group Commands
     * @group CreateModel
     */
    public function testItCreatesAModelFile()
    {
        $command = new CreateModelCommand([$this->name]);
        $result = $command->run();
        $this->assertEquals(0, $result);
        $files = glob($this->modelPath . TextFormatter::snakeToCamelCase($this->name) . '.php');
        $this->assertNotEmpty($files);
        $this->filesCreated = array_merge($this->filesCreated, $files);
    }

}
