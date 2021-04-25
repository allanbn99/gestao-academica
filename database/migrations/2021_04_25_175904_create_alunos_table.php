<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->integer('matricula');
            $table->unsignedBigInteger('pessoa_id');
            $table->integer('pessoa_tipo_perfil_id');
            $table->integer('pessoa_users_id');
            $table->unsignedBigInteger('curso_id');
            $table->integer('curso_disciplina_id');

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
