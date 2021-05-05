<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->char('cpf', 11);
            $table->string('rg', 20);
            $table->string('nome_pai', 100);
            $table->string('nome_mae', 100);
            $table->string('telefone', 20);
            $table->string('nacionalidade', 45);
            $table->string('naturalidade', 45);
            $table->string('titulo_eleitor', 20);
            $table->string('reservista', 20);
            $table->string('carteira_trabalho', 20);
            $table->unsignedBigInteger('tipo_perfil_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('tipo_perfil_id')->references('id')->on('tipo_perfils');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
