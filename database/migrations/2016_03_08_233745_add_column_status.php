<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('negocios', function(Blueprint $table)
		{
			$table->enum('status', [0, 1])->after('telefono_responsable')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('negocios', function(Blueprint $table)
		{
			$table->dropColumn('status');
		});
	}

}
