<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnComplaintsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('complaints', function($table)
		{
			$table->boolean('important')->nullable();
			$table->integer('last_reviewer')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('complaints', function($table)
		{
			$table->dropColumn('important');
			$table->dropColumn('last_reviewer');
		});
	}

}
