<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\funcionarios;
use App\Models\Pessoa;
use App\Models\User;
use App\Models\pessoas_endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\FuncionarioService;


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
        $this->funcionarioService->criar($request);
        view('secretaria.funcionario.Visualizar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('secretaria.funcionario.Visualizar',['pessoas_enderecos'=>$this->funcionarioService->visualizar($id)]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('funcionarios')->find( (int)$request->funcionarioId)->delete();
        return view('secretaria.funcionario.index');
    }


}
