<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->integer('phone_id')->unsigned()->index();
			$table->integer('order_number')->unsigned()->index();
			$table->decimal('price');
			$table->integer('payment_method_id');
			$table->integer('status_id')->unsigned()->index()->default(1);
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
		Schema::drop('orders');
	}

}
