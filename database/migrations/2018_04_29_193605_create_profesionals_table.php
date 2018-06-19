<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code_number");
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('surname');
            $table->integer('user_id')->nullable();
            $table->string('phone');
            $table->string('invitado');
            $table->integer('namecarre_id')->unsigned();
            $table->foreign('namecarre_id')->references('id')->on('carreras');
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
        Schema::drop('profesionals');
    }
}
