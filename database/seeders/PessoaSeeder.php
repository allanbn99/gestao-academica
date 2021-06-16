<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Pessoa;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pessoa::create([
            'nome'              => 'Allan Barbosa',
            'cpf'               => '06470996167',
            'rg'                => '343242432',
            'nome_pai'          => 'Sebastião Barbosa',
            'nome_mae'          => 'Jucineia Andrade',
            'telefone'          => '65920193845',
            'nacionalidade'     => 'Brasileiro',
            'naturalidade'      => 'Cuiabá',
            'titulo_eleitor'    => '8343244321',
            'reservista'        => '34321323214',
            'carteira_trabalho' => '4324342132',
            'tipo_perfil_id'    => 1,
            'user_id'           => 5,
        ]);
    }
}
