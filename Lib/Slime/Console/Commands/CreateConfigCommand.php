<?php


namespace App\Lib\Slime\Console\Commands;


use App\Lib\Slime\Console\GeneratorHelperCommand;

class CreateConfigCommand extends GeneratorHelperCommand
{
    protected function getFilePath()
    {
        return 'config/';
    }

    protected function getStub()
    {
        return PHP_EOL . 'return [' . PHP_EOL . '];' . PHP_EOL;
    }


}