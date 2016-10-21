<?php


namespace App\Lib\Slime\Console\Commands;


use App\Lib\Slime\Console\DatabaseHelperCommand;

class SeedCommand extends DatabaseHelperCommand
{
    protected $classesPath = 'database/seeds';
}