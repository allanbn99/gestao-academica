<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Disciplina;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disciplina::create([
            'nome_disciplina' => 'Lógica de Programação',
            'carga_horaria'   => 60,
        ]);

        Disciplina::create([
            'nome_disciplina' => 'Noções de Banco de Dados',
            'carga_horaria'   => 30,
        ]);

        Disciplina::create([
            'nome_disciplina' => 'Estrutura de Dados',
            'carga_horaria'   => 60,
        ]);

        Disciplina::create([
            'nome_disciplina' => 'Orientação a Objetos',
            'carga_horaria'   => 60,
        ]);

        Disciplina::create([
            'nome_disciplina' => 'Direito para Tecnologia da Informação',
            'carga_horaria'   => 30,
        ]);

        Disciplina::create([
            'nome_disciplina' => 'Banco de Dados Relacional',
            'carga_horaria'   => 30,
        ]);

        Disciplina::create([
            'nome_disciplina' => 'Arquitetura de Sistemas',
            'carga_horaria'   => 30,
        ]);
    }
}
