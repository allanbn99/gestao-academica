<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\{Aluno, Pessoa, User, TipoPerfil, Curso};
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlunoService
{
    /*
    |---------------------------------------------------------------------------------------------------------------------
    |   
    |---------------------------------------------------------------------------------------------------------------------
    */
    private $aluno;

    /*
    |---------------------------------------------------------------------------------------------------------------------
    |   
    |---------------------------------------------------------------------------------------------------------------------
    */
    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }

    /*
    |---------------------------------------------------------------------------------------------------------------------
    |   
    |---------------------------------------------------------------------------------------------------------------------
    */
    public function create(){
        return view('secretaria.aluno.cadastrar', [
            'cursos'=> Curso::get(),
            'roles'=> DB::table('roles')->get(),
            'tipo_perfils'=> TipoPerfil::get()
        ]);
    }

    /*
    |---------------------------------------------------------------------------------------------------------------------
    |   
    |---------------------------------------------------------------------------------------------------------------------
    */
    public function show($id, $view){
        if(Aluno::find($id) == null){
            return redirect()->route('aluno.index')->withErrors(['error' => 'Aluno(a) não encontrado.']);
        }
        $aluno = Aluno::where('id', $id)->with('pessoa', 'pessoa.user.roles', 'pessoa.tipoPerfil', 'curso')->get();
        return view($view, [
            'aluno_pessoa' => $aluno[0]->pessoa,
            'aluno' => $aluno[0],
            'aluno_usuarios' => $aluno[0]->pessoa->user,
            'aluno_Cursos' => $aluno[0]->curso,
            'aluno_roles' => $aluno[0]->pessoa->user->roles[0],
            'aluno_tipo_perfis'=> $aluno[0]->pessoa->tipoPerfil,
            'perfis' => TipoPerfil::get(),
            'roles' => DB::table('roles')->get(),
            'cursos' => Curso::get()
        ]);
    }

    /*
    |---------------------------------------------------------------------------------------------------------------------
    |   
    |---------------------------------------------------------------------------------------------------------------------
    */
    public function consultar(Request $request)
    {
        $alunoSearch =  $request->query('aluno');
        $matriculaSearch =  $request->query('matricula');

        $aluno = DB::table('alunos')
            ->join('pessoas','alunos.pessoa_id','=','pessoas.id')
            ->join('cursos','alunos.curso_id','=','cursos.id')
            ->join('users','pessoas.user_id','=','users.id')
            ->select('pessoas.nome as nome','cursos.nome_curso as nome_curso','users.email as email','users.is_activated as is_activated','alunos.matricula as matricula','alunos.id as id')
            ->where('nome','LIKE',"%{$alunoSearch}%")
            ->where('matricula','LIKE',"%{$matriculaSearch}%")
            ->paginate(10);
    

            return $aluno;
    }

    /*
    |---------------------------------------------------------------------------------------------------------------------
    |   
    |---------------------------------------------------------------------------------------------------------------------
    */
    public function criar(Request $request)
    {
        $request->validate([
            'matricula'=>'required|numeric',
            'nome'=> 'required',
            'cpf'=>'required|unique:pessoas',
            'rg'=>'required|unique:pessoas',
            'nome_pai'=>'required',
            'nome_mae'=>'required',
            'telefone'=>'required|unique:pessoas',
            'nacionalidade'=>'required',
            'naturalidade'=>'required',
            'titulo_eleitor'=>'required|numeric|unique:pessoas',
            'reservista'=>'required|numeric|unique:pessoas',
            'email'=>'required|unique:users',
        ]);

        DB::transaction(function () use($request) {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->senha),
                'is_activated' => $request->is_activated == 'on' ? 1: 0,
            ])->assignRole('Aluno');

            $pessoa = Pessoa::create([
                'nome' => $request->nome,
                'cpf' => str_replace(['.', '-'], ['', ''], $request->cpf),
                'rg' => $request->rg,
                'nome_pai' => $request->nome_pai,
                'nome_mae' => $request->nome_mae,
                'telefone' => $request->telefone,
                'nacionalidade' => $request->nacionalidade,
                'naturalidade' => $request->naturalidade,
                'titulo_eleitor' => $request->titulo_eleitor,
                'reservista' => $request->reservista,
                'user_id' => $user->id,
            ]);

            $aluno = Aluno::create([
                'pessoa_id' => $pessoa->id,
                'matricula' => $request->matricula,
                'curso_id' => $request->nome_curso
            ]);
        });
        return redirect()->route('aluno.index')->with('success', trans('validation.create-success'));
    }

    /*
    |---------------------------------------------------------------------------------------------------------------------
    |   
    |---------------------------------------------------------------------------------------------------------------------
    */
    public function editar(int $id, Request $request)
    {
        $request->validate([
            'matricula'=>'required|numeric',
            'nome' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'nome_pai' => 'required',
            'nome_mae' => 'required',
            'telefone' => 'required',
            'nacionalidade' => 'required',
            'naturalidade' => 'required',
            'titulo_eleitor' => 'required',
            'reservista' => 'required',
            'email' => 'required|email',
        ]);

        DB::transaction(function () use($request, $id) {
            Aluno::where('pessoa_id', $id)->update(['matricula' => $request->matricula]);
            Pessoa::where('id', $id)->update([
                'nome' => $request->nome,
                'cpf' => str_replace(['.', '-'], ['', ''], $request->cpf),
                'rg' => $request->rg,
                'nome_pai' => $request->nome_pai,
                'nome_mae' => $request->nome_mae,
                'telefone' => $request->telefone,
                'nacionalidade' => $request->nacionalidade,
                'naturalidade' => $request->naturalidade,
                'titulo_eleitor' => $request->titulo_eleitor,
                'reservista' => $request->reservista,
                'carteira_trabalho' => $request->carteira_trabalho,
            ]);

            $pessoa = Pessoa::find($id);

            User::where('id', $pessoa->user_id)->update([
                'email' => $request->email,
                'password' => $request->is_activated == 'on' ? Hash::make('default'): Pessoa::find($id)->user->password,
                'is_activated' => $request->is_activated == 'on' ? 1: 0,
            ]);
        });
        return redirect()->route('aluno.index')->with('success', trans('validation.update-success'));
    }


    /*
    |---------------------------------------------------------------------------------------------------------------------
    |   
    |---------------------------------------------------------------------------------------------------------------------
    */
    public function excluir($id)
    {   
        if(null === $this->aluno->find($id)) {
            throw new \InvalidArgumentException("Não foi possível apagar este registro");
        }
        $this->aluno->find($id)->delete();
    }

}
