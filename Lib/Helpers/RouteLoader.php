<?php

namespace App\Lib\Helpers;


/**
 * Class RouteLoader
 * @package App\Lib\Helpers
 */
class RouteLoader
{
    const ROUTE_DIR = 'routes/';

    public static function load()
    {
        return glob('routes/*/routes.php');
    }

} 