<?php


namespace App\Lib\Slime\Console;


use App\Lib\Slime\Console\Traits\StdInReader;

abstract class GeneratorHelperCommand extends SlimeCommand
{
    use StdInReader;

    public function run()
    {
        $fullFileName = $this->getFullFileName();

        if ($this->checkFile($fullFileName)) {
            return 0;
        }

        $result = file_put_contents(
            $fullFileName
            ,
            $this->getHead() . $this->getStub()
        );
        return $result !== false ? 0 : 1;
    }

    protected abstract function getFilePath();

    protected function getHead()
    {
        return "<?php" . PHP_EOL;
    }

    protected function getFileName()
    {
        return $this->getArg(0);
    }

    protected function getFileExtension()
    {
        return ".php";
    }

    protected function getStub()
    {
        return "";
    }

    private function getFullFileName()
    {
        return $this->getFilePath() . $this->getFileName() . $this->getFileExtension();
    }

    private function checkFile($fullFileName)
    {
        if (file_exists($fullFileName)) {
            echo "File already exists, want to override? [y/n]: ";
            $resp = $this->readInput();
            if ($resp !== 'y') {
                return true;
            }
        }

        return false;
    }

}