<?php

use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use App\Models\Users\User;
use App\Models\Users\UserToken;

class S1478638829UserTokens implements DbHelperInterface
{

    public function run()
    {
        $faker = Faker\Factory::create();
        $users = User::all();
        foreach ($users as $user) {
            UserToken::create(
                [
                    'user_id' => $user->id,
                    'user_ip' => $faker->ipv4,
                    'login_token' => str_repeat($user->id, 6),
                    'last_usage' => \Carbon\Carbon::now(),
                ]
            );
        }
    }

}