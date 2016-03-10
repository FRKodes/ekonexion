<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageNegocioPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_negocio', function (Blueprint $table) {
            $table->integer('image_id')->unsigned()->index();
            $table->foreign('image_id')->references('id')->on('image')->onDelete('cascade');
            $table->integer('negocio_id')->unsigned()->index();
            $table->foreign('negocio_id')->references('id')->on('negocio')->onDelete('cascade');
            $table->primary(['image_id', 'negocio_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('image_negocio');
    }
}
