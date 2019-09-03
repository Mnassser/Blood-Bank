<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->integer('order_id');
			$table->timestamps();
			$table->string('notice');
		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}