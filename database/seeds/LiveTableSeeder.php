<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LiveTableSeeder extends AbstractSeeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement("SET foreign_key_checks = 0");

        $this->call('PhoneCarrierTableSeeder');
        $this->call('PhoneBrandTableSeeder');
        $this->call('PhoneModelTableSeeder');
        $this->call('PhoneCapacityTableSeeder');
        $this->call('PhoneProblemTableSeeder');
        $this->call('PhoneConditionTableSeeder');
        $this->call('PhoneTableSeeder');
        $this->call('PhoneModelPhoneProblemTableSeeder');
        $this->call('OrderStatusTableSeeder');
        $this->call('PaymentMethodTableSeeder');
    }
}
