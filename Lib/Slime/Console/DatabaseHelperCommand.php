<?php


namespace App\Lib\Slime\Console;


abstract class DatabaseHelperCommand extends SlimeCommand
{

    protected function runFiles($files)
    {
        foreach ($files as $file) {
            require_once($file);
            $class = basename($file, '.php');
            $obj = new $class;
            $obj->run();
        }
    }
}