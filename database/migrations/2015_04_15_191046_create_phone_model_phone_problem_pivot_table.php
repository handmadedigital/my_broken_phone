<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhoneModelPhoneProblemPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phone_model_phone_problem', function(Blueprint $table)
		{
			$table->integer('phone_model_id')->unsigned()->index();
			$table->foreign('phone_model_id')->references('id')->on('phone_models')->onDelete('cascade');
			$table->integer('phone_problem_id')->unsigned()->index();
			$table->foreign('phone_problem_id')->references('id')->on('phone_problems')->onDelete('cascade');
			$table->decimal('price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phone_model_phone_problem');
	}

}
