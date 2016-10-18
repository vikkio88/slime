<?php


namespace App\Console;


use App\Lib\Slime\Console\SlimeCommand;

class EchoCommand extends SlimeCommand
{

    public function run()
    {
        foreach ($this->args as $arg) {
            echo $arg . " ";
        }
        echo PHP_EOL;
        return 0;
    }
}