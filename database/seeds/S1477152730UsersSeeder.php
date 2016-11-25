<?php

use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;

class S1477152730UsersSeeder implements DbHelperInterface
{

    public function run()
    {
        $faker = Faker\Factory::create();
        $usersNumber = 10;
        for ($i = 1; $i <= $usersNumber; $i++) {
            \App\Models\Users\User::create(
                [
                    'name' => $faker->name,
                    'surname' => $faker->lastName,
                    'email' => $faker->email,
                    'age' => rand(15, 99),
                ]
            );
        }
    }

}