<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phones', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('carrier_id')->unsigned()->index();
            $table->integer('brand_id')->unsiged()->index();
            $table->integer('model_id')->unsigned()->index();
            $table->integer('capacity_id')->unsigned()->index();
            $table->integer('condition_id')->unsigned()->index();
            $table->decimal ('price');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phones');
	}

}
