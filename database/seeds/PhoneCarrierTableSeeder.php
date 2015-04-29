<?php

class PhoneCarrierTableSeeder extends AbstractSeeder
{
    public function run()
    {
        \ThreeAccents\Devices\Phones\Entities\PhoneCarrier::truncate();

        $carriers = ['at&t', 'verizon wireless', 'sprint', 't-mobile', 'unlocked', 'other'];

        foreach($carriers as $carrier)
        {
            \ThreeAccents\Devices\Phones\Entities\PhoneCarrier::create([
                'name' => $carrier,
                'slug' => $this->sluggify($carrier),
                'img' => $this->sluggify($carrier).'-logo.png',
            ]);
        }
    }
}