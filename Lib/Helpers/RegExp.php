<?php

namespace App\Lib\Helpers;


/**
 * Class RegExp
 * @package App\Lib\Helpers
 */
class RegExp
{
    /**
     * @param $regexp
     * @param $target
     * @return null
     */
    public static function getFirstMatch($regexp, $target)
	{
		preg_match_all($regexp, $target, $matches);
		$match = array_key_exists(0,$matches[1]) ? $matches[1][0] : null;
		return $match;
	}

    /**
     * @param $regexp
     * @param $target
     * @return null
     */
    public static function getAllMatch($regexp, $target)
	{
		$matches = null;
		preg_match_all($regexp, $target, $matches);
		return $matches;
	}

}