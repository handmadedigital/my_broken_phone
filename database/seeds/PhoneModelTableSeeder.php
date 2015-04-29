<?php

use Illuminate\Support\Facades\DB;

class PhoneModelTableSeeder extends AbstractSeeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");

        \ThreeAccents\Devices\Phones\Entities\PhoneModel::truncate();

        $apple_models = ['iphone 6 plus', 'iphone 6', 'iphone 5s', 'iphone 5c', 'iphone 5', 'iphone 4s', 'iphone4'];
        $sam_models = ['galaxy s5', 'galaxy s4', 'galaxy s3'];

        foreach($apple_models as $model)
        {
            \ThreeAccents\Devices\Phones\Entities\PhoneModel::create([
                'brand_id' => 1,
                'name' => $model,
                'slug' => $this->sluggify($model),
                'img' => $this->sluggify($model).'-logo.png',
            ]);
        }

        foreach($sam_models as $model)
        {
            \ThreeAccents\Devices\Phones\Entities\PhoneModel::create([
                'brand_id' => 2,
                'name' => $model,
                'slug' => $this->sluggify($model),
                'img' => $this->sluggify($model).'-logo.png',
            ]);
        }
    }
}