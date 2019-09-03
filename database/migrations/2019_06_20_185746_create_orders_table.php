<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('age')->nullable();
			$table->string('phone');
			$table->integer('blood_type_id');
			$table->integer('amount');
			$table->string('hospital_name');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->integer('city_id');
			$table->integer('client_id');

			$table->text('notice');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}