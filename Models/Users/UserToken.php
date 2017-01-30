<?php

namespace App\Models\Users;

use App\Lib\Slime\Models\SlimeModel;
use Carbon\Carbon;

class UserToken extends SlimeModel
{
    protected $fillable = [
        'user_id',
        'user_ip',
        'login_token',
        'last_usage',
    ];

    public static function getByLoginToken($token, $ip = null)
    {
        $userToken = self::where(
            [
                'login_token' => $token
            ]
        )->first();

        if (empty($userToken)) {
            return null;
        }
        $userToken->last_usage = Carbon::now();
        $userToken->user_ip = $ip;
        $userToken->save();
        return $userToken;

    }
}