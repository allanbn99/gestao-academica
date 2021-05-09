<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\funcionarios;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
   public function index(Request $request){


        $funcionarioSearch =  $request->query('funcionario');
        $funcaoSearch =  $request->query('funcao');

        $funcionarios = DB::table('funcionarios')
            ->join('pessoas','funcionarios.pessoa_id','=','pessoas.id')
            ->join('cargos','funcionarios.cargo_id','=','cargos.id')
            ->select('pessoas.nome as pessoa_nome','cargos.nome_cargo as cargo_nome','funcionarios.id as funcionarioId')
            ->where('nome','LIKE', "%{$funcionarioSearch}%")
            ->where('nome_cargo','LIKE', "%{$funcaoSearch}%")
            ->paginate(10);

    return view('secretaria.funcionario.index',['funcionarios'=>$funcionarios]);
   }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('secretaria.funcionario.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
