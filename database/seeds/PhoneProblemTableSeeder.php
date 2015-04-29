<?php

class PhoneProblemTableSeeder extends AbstractSeeder
{
    public function run()
    {
        \ThreeAccents\Devices\Phones\Entities\PhoneProblem::truncate();

        $problems = [
            'diagnostic service',
            'glass only replacement',
            'glass & LCD replacement',
            'water damage repair diagnostic',
            'battery replacement',
            'camera repair',
            'charge port repair',
            'power button repair',
            'volume button repair',
            'ear speaker repair',
            'loudspeaker repair',
            'microphone repair',
            'vibrator repair'
        ];

        foreach($problems as $problem)
        {
            \ThreeAccents\Devices\Phones\Entities\PhoneProblem::create([
                'name' => $problem,
                'slug' => $this->sluggify($problem),
                'img' => $this->sluggify($problem).'-logo.png',
            ]);
        }
    }
}