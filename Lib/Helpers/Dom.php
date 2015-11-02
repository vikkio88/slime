<?php
/**
 * Created by PhpStorm.
 * User: vincenzo.ciaccio
 * Date: 30/10/2015
 * Time: 11:48
 */

namespace App\Lib\Helpers;


/**
 * Class Dom
 * @package App\Lib\Helpers
 */
class Dom
{
    /**
     * @param $node
     * @return string
     */
    public static function getHtml($node) {
		$innerHTML= '';
		$children = $node->childNodes;
		foreach ($children as $child) {
			$innerHTML .= $child->ownerDocument->saveXML( $child );
		}
		return $innerHTML;
	}

}