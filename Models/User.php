<?php


namespace App\Models;

use App\Lib\Slime\Models\SlimeModel;


/**
 * Class User
 * @package App\Models
 */
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