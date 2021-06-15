<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pessoa;
use App\Models\Endereco;
use App\Models\pessoas_endereco;
use App\Models\funcionarios;
use App\Models\TipoPerfil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\FuncionarioService;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class FuncionarioController extends Controller
{
    /**
     * @var FuncionarioService $cursoService
     */
    private $funcionarioService;

    public function __construct(FuncionarioService $funcionarioService)
    {
        $this->funcionarioService = $funcionarioService;
    }
   public function index(Request $request)
   {
    return view('secretaria.funcionario.index',['funcionarios'=>$this->funcionarioService->consultar($request)]);
   }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $cargos = DB::table('cargos')->get();
       $users  = DB::table('users')->get();
       $roles  = DB::table('roles')->get();
       $tipo_perfils  = DB::table('tipo_perfils')->get();
       return view('secretaria.funcionario.cadastro',
       [
        'cargos'=>$cargos,
        'users'=>$users,
        'roles'=>$roles,
        'tipo_perfils'=>$tipo_perfils
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $this->funcionarioService->criar($request);

        } catch (\Exception $e)
        {


            throw ValidationException::withMessages(json_decode($e->getMessage(), true));

        }

        return redirect()->route('funcionario.index')->with('success', trans('validation.update-succes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = funcionarios::find($id);
        $funcionario_pessoa = Pessoa::where('id', '=', $funcionario->pessoa_id)->get();
        $funcionario_enderecos_id = DB::table('pessoas_enderecos')->where('pessoa_id', '=', $funcionario->pessoa_id)->get()[0];
        $funcionario_enderecos = Endereco::where('id', '=', $funcionario_enderecos_id->endereco_id)->get();
        $funcionario_enderecos = Endereco::where('id', '=', $funcionario_enderecos_id->endereco_id)->get();
        $funcionario_usuarios = User::find($funcionario_pessoa[0]->user_id);
        $funcionario_Cargos = Cargo::find($funcionario->cargo_id)->get();
        $funcionario_tipo_perfis = DB::table('tipo_perfils')->get();


        $funcionario_roles = DB::table('roles')->get();

              return view('secretaria.funcionario.Visualizar',
              ['pessoas_enderecos'=>$funcionario_enderecos,
                'funcionario_pessoa'=>$funcionario_pessoa,
                'funcionario'=>$funcionario,
                'funcionario_enderecos'=>$funcionario_enderecos,
                'funcionario_usuarios'=>$funcionario_usuarios,
                'funcionario_Cargos'=> $funcionario_Cargos,
                'funcionario_roles'=>$funcionario_roles,
                'funcionario_tipo_perfis'=> $funcionario_tipo_perfis
              ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = funcionarios::find($id);
        $funcionario_pessoa = Pessoa::where('id', '=', $funcionario->pessoa_id)->get();
        $funcionario_enderecos_id = DB::table('pessoas_enderecos')->where('pessoa_id', '=', $funcionario->pessoa_id)->get()[0];
        $funcionario_enderecos = Endereco::where('id', '=', $funcionario_enderecos_id->endereco_id)->get();
        $funcionario_enderecos = Endereco::where('id', '=', $funcionario_enderecos_id->endereco_id)->get();
        $funcionario_usuarios = User::find($funcionario_pessoa[0]->user_id);
        $funcionario_Cargos = Cargo::find($funcionario->cargo_id)->get();
        $funcionario_tipo_perfis = DB::table('tipo_perfils')->get();
        $funcionario_roles = DB::table('roles')->get();

        return view('secretaria.funcionario.Editar',
        ['pessoas_enderecos'=>$funcionario_enderecos,
        'funcionario_pessoa'=>$funcionario_pessoa,
        'funcionario'=>$funcionario,
        'funcionario_enderecos'=>$funcionario_enderecos,
        'funcionario_usuarios'=>$funcionario_usuarios,
        'funcionario_Cargos'=> $funcionario_Cargos,
        'funcionario_roles'=>$funcionario_roles,
        'funcionario_tipo_perfis'=> $funcionario_tipo_perfis
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


        try {
            $this->funcionarioService->update($request,$id);

        } catch (\Exception $e) {

            throw ValidationException::withMessages(json_decode($e->getMessage(), true));

        }
        return redirect()->route('funcionario.index')->with('success', trans('validation.update-succes'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ('delete-modal' === $id) {
            $id = (int)$request->delete_modal_id;
        }

        try {
            $this->funcionarioService->excluir($id);

        } catch (\Exception $e) {
            throw ValidationException::withMessages(['error' => [$e->getMessage()]]);

        }
        return redirect()->route('funcionario.index')->with('success', trans('validation.delete-success'));
    }


}
