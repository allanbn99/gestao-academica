<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Curso;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::create([
            'nome_curso' => 'Análise e Desenvolvimento de Sistemas',
            'semestres'  => 6,
        ]);

        Curso::create([
            'nome_curso' => 'Banco de Dados',
            'semestres'  => 6,
        ]);
    }
}
