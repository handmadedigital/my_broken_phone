<?php

class PhoneCapacityTableSeeder extends AbstractSeeder
{
    public function run()
    {
        \ThreeAccents\Devices\Phones\Entities\PhoneCapacity::truncate();

        $capacities = ['0', '8', '16', '32', '64', '128'];

        foreach($capacities as $capacity)
        {
            \ThreeAccents\Devices\Phones\Entities\PhoneCapacity::create([
                'name' => $capacity,
                'slug' => $this->sluggify($capacity),
                'img' => $this->sluggify($capacity).'-logo.png',
            ]);
        }
    }
}