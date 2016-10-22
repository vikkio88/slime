<?php


use App\Lib\Helpers\RegExp;

class RegExpTest extends PHPUnit_Framework_TestCase
{

    /**
     * @group Helpers
     * @group Regexp
     */
    public function testItReturnsRightMatchOnMatchOne()
    {
        $text = "stuffCiao1";
        $match = RegExp::getFirstMatch('/stuff(.+?)1/', $text);
        $this->assertEquals('Ciao', $match);
    }

    /**
     * @group Helpers
     * @group Regexp
     */
    public function testItReturnsNullOnMatchOneWhereNoMatch()
    {
        $text = "stuffCiao1";
        $match = RegExp::getFirstMatch('/stuff1(.+?)1/', $text);
        $this->assertNull($match);
    }

    /**
     * @group Helpers
     * @group Regexp
     * @group matchall
     */
    public function testItReturnsPregMatchesMatchAll()
    {
        $text = "stuffCiao1";
        $rgx = '/stuff(.+?)1/';
        $matchesPreg = [];
        preg_match_all($rgx, $text, $matchesPreg);
        $this->assertEquals($matchesPreg, RegExp::getAllMatch($rgx, $text));
    }
}
