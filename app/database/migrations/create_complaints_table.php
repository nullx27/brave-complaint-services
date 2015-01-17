<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('complaints', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('defendant')->nullable();
			$table->longText('desc')->nullable();
			$table->integer('severity')->nullable();
			$table->boolean('investigate');
			$table->longText('data')->nullable();
			$table->string('type');
			$table->string('status');
			$table->boolean('anonymous');
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
		Schema::drop('complaints');
	}

}
