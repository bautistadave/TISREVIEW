<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean("defended");
            $table->string("project_number");
            $table->string('titulo');
            $table->integer('tutor_id');
            $table->string('tutor_data')->nullable();
            $table->string('author');
            $table->string('path')->nullable();
            $table->string('excluded')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('namecarre_id')->unsigned();
            $table->foreign('namecarre_id')->references('id')->on('carreras');
            $table->integer('gestion_id')->unsigned();
            $table->foreign('gestion_id')->references('id')->on('gestions');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('area_id');
            $table->integer('subarea_id')->unsigned();
            $table->foreign('subarea_id')->references('id')->on('areas');
            $table->integer('namemodal_id')->unsigned();
            $table->foreign('namemodal_id')->references('id')->on('modalidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
