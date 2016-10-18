<?php


namespace App\Lib\Slime\Console;


abstract class GeneratorHelperCommand extends SlimeCommand
{
    public function run()
    {
        //TODO ask confirmation if file exists
        $result = file_put_contents(
            $this->getFilePath() . $this->getFileName() . $this->getFileExtension()
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

}