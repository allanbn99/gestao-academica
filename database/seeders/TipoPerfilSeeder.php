<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TipoPerfil;

class TipoPerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPerfil::create([
            'nome_perfil' => 'Técnico Administrativo',
            'is_vinculo'  => 1,
        ]);

        TipoPerfil::create([
            'nome_perfil' => 'Aluno',
            'is_vinculo'  => 0,
        ]);

        TipoPerfil::create([
            'nome_perfil' => 'Professor',
            'is_vinculo'  => 1,
        ]);

        TipoPerfil::create([
            'nome_perfil' => 'Coordenador',
            'is_vinculo'  => 1,
        ]);
    }
}
