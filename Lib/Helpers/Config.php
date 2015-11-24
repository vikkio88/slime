<?php
/**
 * Created by PhpStorm.
 * User: vikkio88
 * Date: 01/11/2015
 * Time: 21:22
 */

namespace App\Lib\Helpers;


/**
 * Class Config
 * @package App\Lib\Helpers
 */
class Config
{
    /**
     * @param $key
     * @param null $directory
     * @return null
     */
    public static function get($key, $directory = null)
    {
        $fileName = $directory . "config/";
        $exp = explode(".", $key);
        if (is_array($exp) && $exp[0] != null && $exp[1] != null && file_exists($fileName . $exp[0] . ".php")) {
            $conf = include($fileName . $exp[0] . ".php");
            $val = array_key_exists($exp[1], $conf) ? $conf[$exp[1]] : null;
            return $val;
        }
        return null;
    }

} 