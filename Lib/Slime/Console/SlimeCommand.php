<?php


namespace App\Lib\Slime\Console;


use App\Lib\Slime\Interfaces\Console\ConsoleCommand;

abstract class SlimeCommand implements ConsoleCommand
{
    protected $mandatoryArgs = [];
    protected $acceptedArgs = [];
    protected $args = [];

    public function __construct(array $args)
    {
        $this->args = $args;

        $this->parseArgs($args);
    }

    /**
     * @return int
     */
    public abstract function run();

    private function parseArgs(array $args)
    {
        foreach ($this->acceptedArgs as $acceptedArg) {
            if (array_key_exists($acceptedArg, $args)) {
                $this->args[] = $args[$acceptedArg];
            }
        }
    }

    protected function getArg($position)
    {
        return isset($this->args[$position]) ? $this->args[$position] : null;
    }
}