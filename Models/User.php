<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


/**
 * Class User
 * @package App\Models
 */
class User extends Eloquent
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