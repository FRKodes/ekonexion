<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriaToNegocios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('negocios', function(Blueprint $table)
		{
			$table->integer('categoria')->unsigned()->after('descripcion')->default(1);
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
			$table->dropColumn('categoria');
		});
	}

}
