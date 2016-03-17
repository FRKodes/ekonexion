<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegociosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('negocios', function(Blueprint $table)
		{
			$table->increments('id');
			/*Datos del negocio*/
			$table->string('nombre_negocio');
			$table->string('descripcion')->nullable();
			$table->string('logo')->nullable();
			$table->string('correo');
			$table->string('telefono');
			$table->string('direccion');
			$table->string('ciudad')->nullable();
			$table->string('estado')->nullable();
			$table->string('sitio_web')->nullable();
			$table->string('coords')->nullable();
			$table->string('fb')->nullable();
			$table->string('ig')->nullable();
			$table->string('tw')->nullable();
			// $table->integer('giro_id');
			/*Datos del responsable*/
			$table->string('nombre_responsable');
			$table->string('correo_responsable');
			$table->string('telefono_responsable');
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
		Schema::drop('negocios');
	}

}
