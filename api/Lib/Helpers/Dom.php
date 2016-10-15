<?php

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