<?php


namespace App\Lib\Slime\Console\Commands;


use App\Lib\Slime\Console\SlimeCommand;

class SeedCommand extends SlimeCommand
{
    const SEED_PATH = 'database/seeds';

    /**
     * @return int
     */
    public function run()
    {
        $files = glob(self::SEED_PATH . '/*.php');
        $this->runSeeders($files);
    }

    private function runSeeders($files)
    {
        foreach ($files as $file) {
            require_once($file);
            $class = basename($file, '.php');
            $obj = new $class;
            $obj->run();
        }
    }
}