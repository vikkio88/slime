<?php

namespace App\Models\Users;

use App\Lib\Slime\Models\SlimeModel;

class User extends SlimeModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'age',
    ];
}