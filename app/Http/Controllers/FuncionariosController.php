<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use Illuminate\Support\Facades\DB;

class FuncionariosController extends Controller
{
   public function index(){
       $funcionarios = DB::table('funcionarios')->get();

    return view('Funcionarios.Funcionario',['funcionarios'=>$funcionarios]);
   }
}
