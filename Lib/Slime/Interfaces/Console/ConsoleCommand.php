<?php


namespace App\Lib\Slime\Interfaces\Console;


interface ConsoleCommand
{
    public function __construct(array $args);

    /**
     * @return int
     */
    public function run();
}