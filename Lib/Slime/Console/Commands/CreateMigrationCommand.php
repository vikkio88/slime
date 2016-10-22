<?php


namespace App\Lib\Slime\Console\Commands;


use App\Lib\Helpers\TextFormatter;
use App\Lib\Slime\Console\GeneratorHelperCommand;

class CreateMigrationCommand extends GeneratorHelperCommand
{
    protected $incrementalFileName = null;
    protected $prefix = 'M'; //stands for migration
    protected $filePath = 'database/migrations/';

    protected function getFileName()
    {
        return $this->getIncrementalFileName();
    }


    protected function getHead()
    {
        $fileHead = parent::getHead();
        $fileHead .= PHP_EOL
            . PHP_EOL
            . 'use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;'
            . PHP_EOL
            . 'use Illuminate\Database\Capsule\Manager as Capsule; '
            . PHP_EOL
            . 'use \Illuminate\Database\Schema\Blueprint as Blueprint;'
            . PHP_EOL;
        return $fileHead;
    }

    protected function getFilePath()
    {
        return $this->filePath;
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
        $tableName = \'table_name\';
        Capsule::schema()->dropIfExists($tableName);
        Capsule::schema()->create($tableName, function (Blueprint $table) {
            $table->increments(\'id\');
            $table->string(\'name\');
            $table->timestamps();
        });
        }
        '
        . PHP_EOL
        . '}';
    }

    protected function getIncrementalFileName()
    {
        if (empty($this->incrementalFileName)) {
            $this->incrementalFileName = $this->prefix . time() . TextFormatter::snakeToCamelCase($this->getArg(0));
        }
        return $this->incrementalFileName;
    }


}