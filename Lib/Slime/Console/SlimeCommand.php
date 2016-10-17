<?php


namespace App\Lib\Slime\Interfaces\Console;


abstract class SlimeCommand implements ConsoleCommand
{
    protected $acceptedArgs = [];

    public function __construct(array $args)
    {
        $this->parseArgs($args);
    }

    /**
     * @return int
     */
    public abstract function run();

    private function parseArgs(array $args)
    {
    }
}