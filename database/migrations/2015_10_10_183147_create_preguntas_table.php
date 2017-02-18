<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tema')->unsigned();
            $table->string('notificacion',250);
            $table->string('pregunta',250);
            $table->string('respuesta_1',250);
            $table->string('respuesta_2',250);
            $table->string('respuesta_3',250);
            $table->string('respuesta_4',250);
            $table->string('respuesta',10);
            $table->string('link',200);
            $table->foreign('id_tema')->references('id')->on('temas');
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
        Schema::drop('preguntas');
    }
}
