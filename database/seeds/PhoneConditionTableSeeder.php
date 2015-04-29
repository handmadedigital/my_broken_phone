<?php

class PhoneConditionTableSeeder extends AbstractSeeder
{
    public function run()
    {
        \ThreeAccents\Devices\Phones\Entities\PhoneCondition::truncate();

        $conditions = ['perfect', 'good', 'poor'];

        foreach($conditions as $condition)
        {
            \ThreeAccents\Devices\Phones\Entities\PhoneCondition::create([
                'name' => $condition,
                'slug' => $this->sluggify($condition),
                'img' => $this->sluggify($condition).'-logo.png',
            ]);
        }
    }
}