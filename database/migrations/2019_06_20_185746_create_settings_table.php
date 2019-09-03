<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('phone');
			$table->string('email');
			$table->text('about_app');
			$table->string('fb_link');
			$table->string('tw_link');
			$table->string('yt_url');
			$table->string('insta_url');
			$table->string('watts_url');
			$table->string('google_url');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}