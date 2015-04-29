<?php

class PhoneBrandTableSeeder extends AbstractSeeder
{
    public function run()
    {
        \ThreeAccents\Devices\Phones\Entities\PhoneBrand::truncate();

        $brands = ['apple', 'samsung', 'nokia', 'blackberry', 'htc', 'motorola', 'lg', 'other'];

        foreach($brands as $brand)
        {
            \ThreeAccents\Devices\Phones\Entities\PhoneBrand::create([
                'name' => $brand,
                'slug' => $this->sluggify($brand),
                'img' => $this->sluggify($brand).'-logo.png',
            ]);
        }
    }
}