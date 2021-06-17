<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pessoa;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Endereco;
use App\Models\pessoas_endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Services\AlunoService;
use Exception;

class AlunoController extends Controller
{
    /**
     * @var AlunoService $alunoService
     */
    private $alunoService;

    public function __construct(AlunoService $alunoService)
    {
        $this->alunoService = $alunoService;
    }
   public function index(Request $request)
   {
    return view('secretaria.aluno.index',
    ['alunos'=>$this->alunoService->consultar($request)]);
   }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $pessoas = DB::table('pessoas')->get();
       $cursos = DB::table('cursos')->get();
       $users  = DB::table('users')->get();
       $roles  = DB::table('roles')->get();
       $tipo_perfils  = DB::table('tipo_perfils')->get();
       return view('secretaria.aluno.cadastrar',
       [
        'pessoas'=>$pessoas,
        'cursos'=>$cursos,
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
        $data = $request->only([
            'matricula',
            'nome',
            'cpf',
            'rg',
            'nome_pai',
            'nome_mae',
            'telefone',
            'nacionalidade',
            'naturalidade',
            'titulo_eleitor',
            'reservista',
            'carteira_trabalho',
            'email',
            
            ]);

        
            try {
                $this->alunoService->criar($data, $request);
    
            } catch (Exception $e) {
                

                throw ValidationException::withMessages(json_decode($e->getMessage(), true));
    
            }
    
            return redirect()->route('aluno.index')->with('success', trans('validation.create-success'));
        }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::find($id);
        $aluno_pessoa = Pessoa::where('id', '=', $aluno->pessoa_id)->get();
        $aluno_usuarios = User::find($aluno_pessoa[0]->user_id);
        $aluno_Cursos = Curso::find($aluno->curso_id)->get();
        $aluno_tipo_perfis = DB::table('tipo_perfils')->get();

        $aluno_roles = DB::table('roles')->get();
        return view('secretaria.aluno.visualizar',
        ['aluno_pessoa'=>$aluno_pessoa,
        'aluno'=>$aluno,
        'aluno_usuarios'=>$aluno_usuarios,
        'aluno_Cursos'=>$aluno_Cursos,
        'aluno_roles'=>$aluno_roles,
        'aluno_tipo_perfis'=>$aluno_tipo_perfis
        
        ]);
    }



    
    /**
     * Show the form for editing the specified resource.
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id);
        $aluno_pessoa = Pessoa::where('id', '=', $aluno->pessoa_id)->get();
        $aluno_usuarios = User::find($aluno_pessoa[0]->user_id);
        $aluno_Cursos = Curso::find($aluno->curso_id)->get();
        $aluno_tipo_perfis = DB::table('tipo_perfils')->get();

        $aluno_roles = DB::table('roles')->get();
        return view('secretaria.aluno.editar',
        ['aluno_pessoa'=>$aluno_pessoa,
        'aluno'=>$aluno,
        'aluno_usuarios'=>$aluno_usuarios,
        'aluno_Cursos'=>$aluno_Cursos,
        'aluno_roles'=>$aluno_roles,
        'aluno_tipo_perfis'=>$aluno_tipo_perfis
        
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $data = $request->only([
            'matricula',
            'nome',
            'cpf',
            'rg',
            'nome_pai',
            'nome_mae',
            'telefone',
            'nacionalidade',
            'naturalidade',
            'titulo_eleitor',
            'reservista',
            'carteira_trabalho',
            'rua',
            'numero',
            'bairro',
            'complemento',
            'cidade',
            'estado',
            'pais',
            'cep',
            'email',
            ]);
            
            
               
            // dd($data,$id,$request);
             try { 
            $this->alunoService->editar($data,$id,$request);
          

        } catch (Exception $e) {
        

            throw ValidationException::withMessages(json_decode($e->getMessage(), true));
            
        }

        return redirect()->route('aluno.index')->with('success', trans('validation.update-succes'));
        
        

    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if('delete-modal'=== $id){
            $id = (int)$request->delete_modal_id;
        }
        try {
            $this->alunoService->excluir($id);

        } catch(\Exception $e) {
            
            throw ValidationException::withMessages(['error'=>[$e->getMessage()]]);
        }
        return redirect()->route('aluno.index')->with('success', trans('validation.delete-success'));
    }


}