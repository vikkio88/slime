<?php


namespace App\Lib\Slime\Console\Commands;


use App\Lib\Slime\Console\DatabaseHelperCommand;

class MigrateCommand extends DatabaseHelperCommand
{
    protected $classesPath = 'database/migrations';
}