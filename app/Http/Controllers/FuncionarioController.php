<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Pessoa, Endereco, PessoaEndereco, Funcionario, TipoPerfil, Cargo};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\FuncionarioService;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class FuncionarioController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |   Atributo que recebe o service de funcionário.
    |--------------------------------------------------------------------------
    */
    private $funcionarioService;


    /*
    |--------------------------------------------------------------------------
    |   Método mágico que faz a injeção de dependência.
    |--------------------------------------------------------------------------
    */
    public function __construct(FuncionarioService $funcionarioService)
    {
        $this->funcionarioService = $funcionarioService;
    }


    /*
    |--------------------------------------------------------------------------
    |   Retorna a pagina inicial com a lista de funcionários.
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        return view('secretaria.funcionario.index',[
            'funcionarios' => $this->funcionarioService->funcionarios()
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    |   Retorna formulário de cadastro.
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('secretaria.funcionario.cadastro',[
            'cargos'=> Cargo::get(),
            'users'=> User::get(),
            'roles'=> DB::table('roles')->get(),
            'tipo_perfils'=> TipoPerfil::get()
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    |   Chama o serviço de cadastro de funcionário.
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        return $this->funcionarioService->criar($request);
    }


    /*
    |--------------------------------------------------------------------------
    |   Retorna a visualização dos dados de um funcionário.
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        return $this->funcionarioService->visualizar($id, 'secretaria.funcionario.Visualizar');
    }


    /*
    |--------------------------------------------------------------------------
    |   Retorna o formulário de edição de funcionário.
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return $this->funcionarioService->visualizar($id, 'secretaria.funcionario.Editar');
    }

    
    /*
    |--------------------------------------------------------------------------
    |   Atualiza um funcionário.
    |--------------------------------------------------------------------------
    */
    public function update(Request $request,$id)
    {
        return $this->funcionarioService->update($request, $id);
    }
    
    
    /*
    |--------------------------------------------------------------------------
    |   Deleta um funcionário.
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        return $this->funcionarioService->excluir($id);
    }


}
