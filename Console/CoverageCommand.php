<?php


namespace App\Console;


use App\Lib\Slime\Console\SlimeCommand;
use InvalidArgumentException;
use SimpleXMLElement;

class CoverageCommand extends SlimeCommand
{
    protected $acceptedArgs = [

    ];

    /**
     * @return int
     */
    public function run()
    {
        $inputFile = isset($this->args[0]) ? $this->args[0] : "clover.xml";
        $targetCoverage = (int)(isset($argv[1]) ? $argv[1] : 1);
        $percentage = min(100, max(0, $targetCoverage));

        if (!file_exists($inputFile)) {
            throw new InvalidArgumentException('Invalid input file provided');
        }

        if (!$percentage) {
            throw new InvalidArgumentException('An integer checked percentage must be given as second parameter');
        }

        $xml = new SimpleXMLElement(file_get_contents($inputFile));
        $metrics = $xml->xpath('//metrics');
        $totalElements = 0;
        $checkedElements = 0;

        foreach ($metrics as $metric) {
            $totalElements += (int)$metric['elements'];
            $checkedElements += (int)$metric['coveredelements'];
        }

        $coverage = ($checkedElements / $totalElements) * 100;

        if ($coverage < $percentage) {
            echo 'Code coverage is ' . $coverage . '%, which is below the accepted ' . $percentage . '%' . PHP_EOL;
            exit(1);
        }

        echo 'Code coverage is ' . round($coverage, 2) . '% - OK!' . PHP_EOL;
    }
}