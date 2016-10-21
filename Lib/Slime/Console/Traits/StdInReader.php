<?php

namespace App\Lib\Slime\Console\Traits;


trait StdInReader
{
    private function readInput()
    {
        return trim(fgets(STDIN));
    }
}