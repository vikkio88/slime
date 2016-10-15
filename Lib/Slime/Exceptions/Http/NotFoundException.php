<?php


namespace App\Lib\Slime\Exceptions\Http;


use App\Lib\Slime\Exceptions\SlimeException;

class NotFoundException extends SlimeException
{
    protected $code = 404;

}