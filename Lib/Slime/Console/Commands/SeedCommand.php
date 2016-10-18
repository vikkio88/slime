<?php


namespace App\Lib\Slime\Console\Commands;


use App\Lib\Slime\Console\DatabaseHelperCommand;

class SeedCommand extends DatabaseHelperCommand
{
    const SEED_PATH = 'database/seeds';

    /**
     * @return int
     */
    public function run()
    {
        $files = glob(self::SEED_PATH . '/*.php');
        $this->runFiles($files);

        return 0;
    }
}