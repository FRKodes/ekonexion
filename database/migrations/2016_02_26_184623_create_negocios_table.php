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
		Schema::create('negocio', function(Blueprint $table)
		{
			$table->increments('id');
			/*Datos del negocio*/
			$table->string('nombre_negocio');
			$table->string('descripcion');
			$table->string('logo');
			$table->string('correo');
			$table->string('telefono');
			$table->string('direccion');
			$table->string('sitio_web');
			$table->string('coords');
			$table->string('fb');
			$table->string('ig');
			$table->string('tw');
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
		Schema::drop('negocio');
	}

}
