<?php

use Illuminate\Support\Facades\DB;
use ThreeAccents\Orders\Entities\OrderStatus;

class OrderStatusTableSeeder extends AbstractSeeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");

        OrderStatus::truncate();
        OrderStatus::unguard();

        $status = ['order placed', 'quote sent', 'declined', 'accepted'];

        foreach($status as $stat)
        {
            OrderStatus::create([
                'name' => $stat,
                'slug' => $this->sluggify($stat),
                'img' => $stat.'stats.png'
            ]);
        }
    }
}