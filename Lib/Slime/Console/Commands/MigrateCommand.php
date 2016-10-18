<?php


namespace App\Lib\Slime\Console\Commands;


use App\Lib\Slime\Console\DatabaseHelperCommand;

class MigrateCommand extends DatabaseHelperCommand
{
    const MIGRATIONS_PATH = 'database/migrations';

    /**
     * @return int
     */
    public function run()
    {
        $files = glob(self::MIGRATIONS_PATH . '/*.php');
        $this->runFiles($files);

        return 0;
    }

}