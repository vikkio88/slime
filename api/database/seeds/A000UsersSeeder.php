<?php


class A000UsersSeeder
{
    function run()
    {
        $usersNumber = 10;
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= $usersNumber; $i++) {
            \App\Models\User::create(
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