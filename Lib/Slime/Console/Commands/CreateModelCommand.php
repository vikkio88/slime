<?php


namespace App\Lib\Slime\Console\Commands;


use App\Lib\Helpers\TextFormatter;
use App\Lib\Slime\Console\GeneratorHelperCommand;

class CreateModelCommand extends GeneratorHelperCommand
{
    protected function getFileName()
    {
        return TextFormatter::snakeToCamelCase($this->getArg(0));
    }


    protected function getHead()
    {
        $fileHead = parent::getHead();
        $fileHead .= PHP_EOL . 'namespace App\Models;' . PHP_EOL . 'use App\Lib\Slime\Models\SlimeModel;' . PHP_EOL;
        return $fileHead;
    }

    protected function getFilePath()
    {
        return 'Models/';
    }

    protected function getStub()
    {
        return PHP_EOL . 'class ' .
        TextFormatter::snakeToCamelCase($this->getArg(0)) .
        ' extends SlimeModel {' . PHP_EOL . '}';
    }


}