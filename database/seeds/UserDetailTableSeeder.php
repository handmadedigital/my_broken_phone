<?php

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserDetailTableSeeder extends AbstractSeeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::statement("SET foreign_key_checks = 0");

        \ThreeAccents\Users\Entities\UserDetail::truncate();

        \ThreeAccents\Users\Entities\UserDetail::create([
            'user_id' => 1,
            'address' => '15630 sw 16th ct',
            'city' => 'pembroke pines',
            'state' => 'florida',
            'country' => 'usa',
            'zip' => 33027,
            'paypal_email' => '',
        ]);

        for($i = 2; $i <= 100; $i++)
        {
            \ThreeAccents\Users\Entities\UserDetail::create([
                'user_id' => $i,
                'address' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => 'california',
                'country' => 'usa',
                'zip' => 33027,
                'paypal_email' => '',
            ]);
        }
    }
}