<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{Endereco, Pessoa, User, PessoaEndereco, Funcionario, Cargo, TipoPerfil};
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FuncionarioService
{

    private $funcionarios;

    public function __construct(Funcionario $funcionarios)
    {
        $this->funcionarios = $funcionarios;
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------------------------
    |   Serviço para criar um novo funcionário.
    |-------------------------------------------------------------------------------------------------------------------------------------
    */
    public function criar(Request $request)
    {
        //Funcionando ok
        $request->validate([
            'matricula'     =>'required',
            'nome'          => 'required',
            'cpf'           => 'required',
            'rg'            => 'required',
            'nome_pai'      => 'required',
            'nome_mae'      => 'required',
            'telefone'      => 'required',
            'nacionalidade'         => 'required',
            'naturalidade'          => 'required',
            'titulo_eleitor'        => 'required',
            'reservista'            => 'required',
            'carteira_trabalho'     => 'required',
            'rua'           => 'required',
            'numero'        => 'required',
            'bairro'        => 'required',
            //'complemento'   => 'required',
            'cidade'        => 'required',
            'estado'        => 'required',
            //'pais'          => 'required',
            'cep'           => 'required',
            'email'         => 'required'
        ]);

        DB::transaction(function() use($request) {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make('default'),
                'is_activated' => $request->is_activated == 'on' ? 1: 0,
            ])->assignRole($request->permissao);
    
            $pessoa = Pessoa::create([
                'nome'          => $request->nome,
                'cpf'           => str_replace(['.', '-'], ['', ''], $request->cpf),
                'rg'            => $request->rg,
                'nome_pai'      => $request->nome_pai,
                'nome_mae'      => $request->nome_mae,
                'telefone'      => $request->telefone,
                'nacionalidade' => $request->nacionalidade,
                'naturalidade'      => $request->naturalidade,
                'titulo_eleitor'    => $request->titulo_eleitor,
                'reservista'        => $request->reservista,
                'carteira_trabalho' => $request->carteira_trabalho,
                'tipo_perfil_id'    => $request->tipo_perfil_id,
                'user_id'           => $user->id,
            ]);
            
            $endereco = Endereco::create([
                'rua'       => $request->rua,
                'numero'    => $request->numero,
                'bairro'    => $request->bairro,
                'complemento'   => $request->complemento ?? 'none',
                'cidade'        => $request->cidade,
                'estado'        => $request->estado,
                'pais'          => 'Brasil',
                'cep'           => $request->cep,
            ]);
    
            $pessoa_endereco = PessoaEndereco::create([
                'pessoa_id'     => $pessoa->id,
                'endereco_id'   => $endereco->id,
            ]);
    
            $funcionario = Funcionario::create([
                'pessoa_id' => $pessoa->id,
                'matricula' => $request->matricula,
                'cargo_id' => $request->cargo_id,
                'is_status' => 0
            ]);
        });
        
        return redirect()->route('funcionario.index')->with('success', trans('validation.create-success'));

    }

    /*
    |-------------------------------------------------------------------------------------------------------------------------------------
    |   Serviço para retornar todos os funcionários.
    |-------------------------------------------------------------------------------------------------------------------------------------
    */
    public function funcionarios(){
        return Funcionario::with('pessoa', 'cargo')->paginate(10);
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------------------------
    |   Serviço para excluir dados de um funcionário.
    |-------------------------------------------------------------------------------------------------------------------------------------
    */
    public function excluir($id)
    {
        if(empty(Funcionario::find($id))){
            return redirect()->route('funcionario.index')->withErrors(['error' => 'Funcionário não encontrado(a).']);
        }
        DB::transaction(function () use($id) {
            Funcionario::find($id)->delete();
        });
        return redirect()->route('funcionario.index')->with('success', trans('validation.delete-success'));
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------------------------
    |   Serviço para atualizar dados de um funcionário.
    |-------------------------------------------------------------------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'matricula'     =>'required',
            'nome'          => 'required',
            'cpf'           => 'required',
            'rg'            => 'required',
            'nome_pai'      => 'required',
            'nome_mae'      => 'required',
            'telefone'      => 'required',
            'nacionalidade' => 'required',
            'naturalidade'  => 'required',
            'titulo_eleitor'    => 'required',
            'reservista'        => 'required',
            'carteira_trabalho' => 'required',
            'rua'               => 'required',
            'numero'            => 'required',
            'bairro'        => 'required',
            'complemento'   => 'required',
            'cidade'        => 'required',
            'estado'        => 'required',
            'pais'          => 'required',
            'cep'           => 'required',
            'email'         => 'required',
        ]);

        DB::transaction(function () use($request, $id) {
            Funcionario::Where('pessoa_id', $id)->update(['cargo_id' => $request->cargo_id]);

            Pessoa::where('id', $id)->update([
                'nome'      => $request->nome,
                'cpf'       => $request->cpf,
                'rg'        => $request->rg,
                'nome_pai'  => $request->nome_pai,
                'nome_mae'  => $request->nome_mae,
                'telefone'  => $request->telefone,
                'nacionalidade'     => $request->nacionalidade,
                'naturalidade'      => $request->naturalidade,
                'titulo_eleitor'    => $request->titulo_eleitor,
                'reservista'        => $request->reservista,
                'carteira_trabalho' => $request->carteira_trabalho,
                'tipo_perfil_id'    => $request->tipo_perfil_id,
            ]);

            $pessoa = Pessoa::find($id);

            $pessoa_endereco =  PessoaEndereco::where('pessoa_id', $id)->get();

            Endereco::where('id', $pessoa_endereco[0]->endereco_id)->update([
                'rua'       => $request->rua,
                'numero'    => $request->numero,
                'bairro'    => $request->bairro,
                'complemento'   => $request->complemento,
                'cidade'        => $request->cidade,
                'estado'        => $request->estado,
                'pais'          => $request->pais,
                'cep'           => $request->cep,
            ]);

            User::where('id', $pessoa->user_id)->update([
                'email' => $request->email,
                'is_activated' => $request->is_activated == 'on' ? 1: 0,
            ]);
            User::find($pessoa->user_id)->assignRole($request->permissao);

        });
        return redirect()->route('funcionario.index')->with('success', trans('validation.update-success'));
    }

    /*
    |-------------------------------------------------------------------------------------------------------------------------------------
    |   Serviço para retornar dados de um funcionário.
    |-------------------------------------------------------------------------------------------------------------------------------------
    */
    public function visualizar($id, $view){
        if(Funcionario::find($id) == null){
            return redirect()->route('funcionario.index')->withErrors(['error' => 'Funcionário(a) não encontrado.']);
        }
        $funcionario = Funcionario::where('id', $id)->with('pessoa', 'pessoa.user', 'pessoa.tipoPerfil', 'pessoa.endereco.endereco', 'cargo')->get();
        $funcionario_roles = DB::table('roles')->get();
        return view($view, [
            'pessoas_enderecos' => $funcionario[0]->pessoa->endereco,
            'funcionario_pessoa' => $funcionario[0]->pessoa,
            'funcionario' => $funcionario[0],
            'funcionario_enderecos' => $funcionario[0]->pessoa->endereco->endereco,
            'funcionario_usuarios' => $funcionario[0]->pessoa->user,
            'funcionario_Cargos' => $funcionario[0]->cargo,
            'funcionario_roles' => $funcionario_roles,
            'funcionario_tipo_perfis' => $funcionario[0]->pessoa->tipoPerfil,
            'cargos' => Cargo::get(),
            'perfis' => TipoPerfil::get()
        ]);
    }
}
