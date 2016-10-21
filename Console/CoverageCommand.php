<?php


namespace App\Console;


use App\Lib\Slime\Console\SlimeCommand;
use InvalidArgumentException;
use SimpleXMLElement;

class CoverageCommand extends SlimeCommand
{
    const CLOVER_FILE = 'clover.xml';

    /**
     * @return int
     */
    public function run()
    {
        $targetCoverage = $this->getArg(0);

        $inputFile = self::CLOVER_FILE;
        $targetCoverage = (int)(!empty($targetCoverage) ? $targetCoverage : 1);
        $percentage = min(100, max(0, $targetCoverage));

        if (!file_exists($inputFile)) {
            throw new InvalidArgumentException(
                'Clover file not present, remember to run: phpunit --coverage-clover ' . $inputFile
            );
        }

        if (!$percentage) {
            throw new InvalidArgumentException('An integer checked percentage must be given as second parameter');
        }
        $coverage = $this->getCoverage($inputFile);


        if ($coverage < $percentage) {
            echo 'Code coverage is ' . $coverage . '%, which is below the accepted ' . $percentage . '%' . PHP_EOL;
            return 1;
        }

        echo 'Code coverage is ' . $coverage . '% - OK!' . PHP_EOL;
        return 0;
    }

    private function getCoverage($inputFile)
    {
        $xml = new SimpleXMLElement(file_get_contents($inputFile));
        $metrics = $xml->xpath('//metrics');
        $totalElements = 0;
        $checkedElements = 0;

        foreach ($metrics as $metric) {
            $totalElements += (int)$metric['elements'];
            $checkedElements += (int)$metric['coveredelements'];
        }

        return round(($checkedElements / $totalElements) * 100, 2);
    }
}