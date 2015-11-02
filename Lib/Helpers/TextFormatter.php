<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.ciaccio
 * Date: 30/10/2015
 * Time: 15:13
 */

namespace App\Lib\Helpers;


/**
 * Class TextFormatter
 * @package App\Lib\Helpers
 */
class TextFormatter
{

    /**
     * @param $currencyString
     * @return float
     */
    public static function currencyStringToFloat($currencyString){
		//currency is always in this format € 550

		return floatval(
			str_replace(
				',',
				'',
				RegExp::getFirstMatch(
					'/([+-]?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?)/',
					$currencyString
				)
			)
		);
	}

}