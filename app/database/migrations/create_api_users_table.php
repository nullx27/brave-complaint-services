<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApiUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::create('api_users', function($t)
		{
			$t->increments('id')->unsigned();
			$t->string('token', 64);
			$t->text('remember_token');
			$t->string('character_name', 128);
			$t->integer('alliance_id');
			$t->text('alliance_name');
			$t->longText('user_permissions');
			$t->text('tags');
			$t->integer('status');
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('api_users');
	}

}
