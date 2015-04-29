<?php

use Illuminate\Support\Facades\DB;

class PhoneTableSeeder extends AbstractSeeder
{
    public function run()
    {
        DB::table('phones')->truncate();

        $carriers = DB::table('phone_carriers')->get();
        $brands = DB::table('phone_brands')->get();
        $models = DB::table('phone_models')->get();
        $capacity = DB::table('phone_capacities')->get();
        $conditions = DB::table('phone_conditions')->get();

        for($car = 1; $car <= count($carriers); $car++)
        {
            for($b = 1; $b <= count($brands); $b++)
            {
                for($m = 1; $m <= count($models); $m++)
                {
                    for($cap = 1; $cap <= count($capacity); $cap++)
                    {
                        for($con = 1; $con <= count($conditions); $con++)
                        {
                            DB::table('phones')->insert([
                                'carrier_id' => $car,
                                'brand_id' => $b,
                                'model_id' => $m,
                                'capacity_id' => $cap,
                                'condition_id' => $con,
                                'price' => rand(50, 500)
                            ]);
                        }
                    }
                }
            }
        }
    }
}