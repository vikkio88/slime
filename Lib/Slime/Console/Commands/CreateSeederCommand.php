<?php


namespace App\Lib\Slime\Console\Commands;


class CreateSeederCommand extends CreateMigrationCommand
{
    protected $prefix = 'S'; //stands for seeder
    protected $filePath = 'database/seeds/';

    protected function getHead()
    {
        $fileHead = '<?php'
            . PHP_EOL
            . PHP_EOL
            . 'use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;'
            . PHP_EOL;
        return $fileHead;
    }

    protected function getStub()
    {
        return PHP_EOL . 'class ' .
        $this->getIncrementalFileName() .
        ' implements DbHelperInterface {'
        . PHP_EOL
        . '
        public function run()
        {
        $faker = Faker\Factory::create();
        
        }
        '
        . PHP_EOL
        . '}';
    }
}