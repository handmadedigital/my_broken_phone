<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phone_models', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('brand_id')->unsigned()->index();
            $table->string('name')->unique();
            $table->string('slug')->unique()->index();
            $table->string('img');
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
		Schema::drop('phone_models');
	}

}