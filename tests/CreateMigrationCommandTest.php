<?php


use App\Lib\Helpers\TextFormatter;
use App\Lib\Slime\Console\Commands\CreateMigrationCommand;

class CreateMigrationCommandTest extends PHPUnit_Framework_TestCase
{
    private $name = 'test_migration';
    private $migrationPath = 'database/migrations/';
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
     * @group CreateMigration
     */
    public function testItCreatesAMigrationFile()
    {
        $command = new CreateMigrationCommand([$this->name]);
        $result = $command->run();
        $this->assertEquals(0, $result);
        $files = glob($this->migrationPath . '*' . TextFormatter::snakeToCamelCase($this->name) . '.php');
        $this->assertNotEmpty($files);
        $this->filesCreated = array_merge($this->filesCreated, $files);
    }

}
