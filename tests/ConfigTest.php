<?php


use App\Lib\Helpers\Config;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    /**
     * @group Helpers
     * @group Config
     */
    public function testConfigHelperWillLoadtheRightFile()
    {
        $expected = require 'config/configSample.php';
        $val = Config::get('configSample.stuff');
        $this->assertEquals($expected['stuff'], $val);
    }

    /**
     * @group Helpers
     * @group Config
     * @group configwillcasttonullifkeynotspecified
     */
    public function testConfigHelperWillCastToNullIfConfigKeyIsNotSpecified()
    {
        $val = Config::get('configSample');
        $this->assertNull($val);
    }

    /**
     * @group Helpers
     * @group Config
     * @group configwillcasttonull
     */
    public function testConfigHelperWillCastToNullIfConfigKeyIsNotThere()
    {
        $val = Config::get('configSample.aConfigKeyWhichIsNotThere');
        $this->assertNull($val);
    }
    /**
     * @group Helpers
     * @group Config
     * @group configwillcasttonulliffiledoesnotexist
     */
    public function testConfigHelperWillCastToNullIfConfigFileDoesNotExist()
    {
        $val = Config::get('aConfigFileWhichIsNotThere.aConfigKeyWhichIsNotThere');
        $this->assertNull($val);
    }


}
