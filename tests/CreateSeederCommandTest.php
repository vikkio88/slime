<?php


use App\Lib\Helpers\TextFormatter;
use App\Lib\Slime\Console\Commands\CreateSeederCommand;

class CreateSeederCommandTest extends PHPUnit_Framework_TestCase
{
    private $name = 'test_seeder';
    private $seederPath = 'database/seeds/';
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
     * @group CreateSeeder
     */
    public function testItCreatesASeederFile()
    {
        $command = new CreateSeederCommand([$this->name]);
        $result = $command->run();
        $this->assertEquals(0, $result);
        $files = glob($this->seederPath . '*' . TextFormatter::snakeToCamelCase($this->name) . '.php');
        $this->assertNotEmpty($files);
        $this->filesCreated = array_merge($this->filesCreated, $files);
    }

}
