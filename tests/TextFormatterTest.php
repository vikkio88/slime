<?php


use App\Lib\Helpers\TextFormatter;

class TextFormatterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @group Helpers
     * @group TextFormatter
     */
    public function testDoesConvertToCamelCase()
    {
        $string = "a_snake_case_string";
        $string = TextFormatter::snakeToCamelCase($string);
        $this->assertFalse(strstr($string, '_'));
    }

}
