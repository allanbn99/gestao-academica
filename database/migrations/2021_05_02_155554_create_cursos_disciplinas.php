<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosDisciplinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('disciplina_id');

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos_disciplinas');
    }
}
