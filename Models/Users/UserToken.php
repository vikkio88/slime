<?php

namespace App\Models\Users;

use App\Lib\Slime\Models\SlimeModel;
use Carbon\Carbon;

class UserToken extends SlimeModel
{
    protected $fillable = [
        'user_id',
        'user_ip',
        'device_token',
        'device_name',
        'token',
        'last_usage',
    ];

    public static function getValidUserId($token, $ip = null)
    {
        $userToken = self::where(
            [
                'token' => $token
            ]
        )->first();

        if (!empty($userToken)) {
            $userToken->last_usage = Carbon::now();
            $userToken->user_ip = $ip;
            $userToken->save();
            return $userToken->user_id;
        }

        return null;
    }
}