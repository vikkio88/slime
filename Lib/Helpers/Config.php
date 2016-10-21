<?php

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
        $keys = explode(".", $key);

        if (empty($keys) || count($keys) < 2) {
            return null;
        }

        $fileName = $directory . "config/" . $keys[0] . ".php";
        if (!file_exists($fileName)) {
            return null;
        }

        $conf = include($fileName);
        $val = array_key_exists($keys[1], $conf) ? $conf[$keys[1]] : null;
        return $val;
    }

} 