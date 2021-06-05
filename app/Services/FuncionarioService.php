<?php

namespace App\Services;

use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Models\Funcionarios;

use App\Models\Pessoa;
use App\Models\User;
use App\Models\pessoas_endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FuncionarioService
{

     /**
     * @var Funcionarios $curso
     */
    private $funcionarios;

    public function __construct(Funcionarios $funcionarios)
    {
        $this->funcionarios = $funcionarios;
    }
    public function criar(Request $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make('default'); //$request->CPF
        $user->assignRole($request->permissao);
        $user->save();
        //pegar o id
        $pessoa = new Pessoa;
        $pessoa->nome = $request->nome  ;
        $pessoa->cpf = $request->cpf ;
        $pessoa->rg = $request->rg;
        $pessoa->nome_pai = $request->nome_pai;
        $pessoa->nome_mae = $request->nome_mae;
        $pessoa->telefone = $request->telefone;
        $pessoa->nacionalidade = $request->nacionalidade;
        $pessoa->naturalidade = $request->naturalidade;
        $pessoa->titulo_eleitor = $request->titulo_eleitor;
        $pessoa->reservista = $request->reservista;
        $pessoa->carteira_trabalho = $request->carteira_trabalho;
        $pessoa->tipo_perfil_id = $request->tipo_perfil_id;
        $pessoa->user_id = $user->id;
        // $pessoa->celu = $request->telefone;

        $endereco = new Endereco;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->bairro = $request->bairro;
        $endereco->complemento = $request->complemento;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->pais = $request->pais;
        $endereco->cep = $request->cep;

        $pessoa->save();
        $endereco->save();

        $pessoa_endereco = new pessoas_endereco;

        $pessoa_endereco->pessoa_id = $pessoa->id;
        $pessoa_endereco->endereco_id = $endereco->id;
        $pessoa_endereco->save();

        $funcionario = new funcionarios;
        $funcionario->pessoa_Id = $pessoa->id;
        $funcionario->matricula = $request->matricula;
        $funcionario->cargo_id = $request->cargo_id;

        $funcionario->save();

        $usuario = new User;
        $usuario->email =  $request->email;
        $usuario->password =  $request->password;
        $usuario->is_activated = 1;
    }

    public function consultar(Request $request)
    {
        $funcionarioSearch =  $request->query('funcionario');
        $funcaoSearch =  $request->query('funcao');

        $funcionarios = DB::table('funcionarios')
            ->join('pessoas','funcionarios.pessoa_id','=','pessoas.id')
            ->join('cargos','funcionarios.cargo_id','=','cargos.id')
            ->select('pessoas.nome as pessoa_nome','cargos.nome_cargo as cargo_nome','funcionarios.id as funcionarioId','funcionarios.is_status as is_status')
            ->where('nome','LIKE', "%{$funcionarioSearch}%")
            ->where('nome_cargo','LIKE', "%{$funcaoSearch}%")
            ->paginate(10);

            return $funcionarios;
    }

    public function visualizar($id)
    {
        $funcionarios = DB::table('pessoas_enderecos')
        ->join('funcionarios','funcionarios.pessoa_id','=','pessoas_enderecos.pessoa_id')
        ->join('enderecos','enderecos.id','=','pessoas_enderecos.endereco_id')
        ->join('cargos','cargos.id','=','funcionarios.cargo_id')
        ->join('pessoas','pessoas.id','=','pessoas_enderecos.pessoa_id')
        ->join('users','users.id','=','pessoas.user_id')
        ->where('funcionarios.id','=', $id)
        ->get();


         return $funcionarios;
    }

    public function excluir($id)
    {
        if (null === $this->funcionarios->find($id)) {
            throw new \InvalidArgumentException("Não foi possível apagar este registro");
        }

        $this->funcionarios->find($id)->delete();
    }

}
