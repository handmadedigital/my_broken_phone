<?php

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use ThreeAccents\Users\Entities\User;

class UserTableSeeder extends AbstractSeeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        $faker = Faker::create();

        User::truncate();
        User::unguard();

        User::create([
            'username' => 'rodzzlessa',
            'slug' => 'rodzzlessa',
            'email' => 'rodrigo@tgld.co',
            'first_name' => 'rodrigo',
            'last_name' => 'lessa',
            'password' => Hash::make('ro'),
            'is_admin' => 1
        ]);

        for($i = 0; $i < 100; $i++)
        {
            $username = $faker->unique()->userName;

            User::create([
                'username' => $username,
                'slug' => $this->sluggify($username),
                'email' => $faker->unique()->email,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'password' => Hash::make('ro'),
                'is_admin' => 0
            ]);
        }
    }
}