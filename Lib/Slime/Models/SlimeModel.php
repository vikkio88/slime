<?php

namespace App\Lib\Slime\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class SlimeModel extends Eloquent
{

    public static function scopePage($query, $pagination)
    {
        $limit = $pagination['limit'];
        $offset = ($pagination['page'] - 1) * $pagination['limit'];
        return $query->take($limit)->skip($offset);
    }

}