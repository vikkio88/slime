<?php

use App\Lib\Slime\Console\Commands\CreateConfigCommand;

class CreateConfigCommandTest extends PHPUnit_Framework_TestCase
{
    private $name = 'testConfig';
    private $configPath = 'config/';
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
     * @group CreateConfig
     */
    public function testItCreatesAConfigFile()
    {
        $command = new CreateConfigCommand([$this->name]);
        $result = $command->run();
        $this->assertEquals(0, $result);
        $files = glob($this->configPath . $this->name . '.php');
        $this->assertNotEmpty($files);
        $this->filesCreated = array_merge($this->filesCreated, $files);
    }

}
