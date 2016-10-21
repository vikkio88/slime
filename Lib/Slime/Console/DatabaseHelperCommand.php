<?php


namespace App\Lib\Slime\Console;


abstract class DatabaseHelperCommand extends SlimeCommand
{
    protected $classesPath = null;
    /**
     * @return int
     */
    public function run()
    {
        $files = glob($this->classesPath . '/*.php');
        $this->runFiles($files);
        return 0;
    }

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