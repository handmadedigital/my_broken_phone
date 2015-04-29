<?php
use Illuminate\Support\Facades\DB;
use ThreeAccents\Devices\Phones\Entities\PhoneModel;
use ThreeAccents\Devices\Phones\Entities\PhoneProblem;

class PhoneModelPhoneProblemTableSeeder extends AbstractSeeder
{
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");

        $problems = PhoneProblem::all();

        $models = PhoneModel::all();

        for($m = 1; $m <= count($models); $m++)
        {
            foreach($problems as $problem)
            {
                $mod = PhoneModel::find($m);

                $mod->problems()->attach($problem, ['price' => rand(10, 150)]);

                $mod->save();
            }
        }
    }
}