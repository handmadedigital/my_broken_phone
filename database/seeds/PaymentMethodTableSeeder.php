<?php

use Illuminate\Support\Facades\DB;
use ThreeAccents\Orders\Entities\PaymentMethod;

class PaymentMethodTableSeeder extends AbstractSeeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");

        PaymentMethod::truncate();
        PaymentMethod::unguard();

        $methods = ['PayPal', 'Check'];

        foreach($methods as $method)
        {
            PaymentMethod::create([
                'name' => $method,
                'slug' => $this->sluggify($method),
                'img' => $method.'-logo.png',
            ]);
        }
    }
}