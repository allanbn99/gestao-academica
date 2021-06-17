<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlunoService
{
 /**
     * @var Aluno $aluno
     */
    private $aluno;

    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }
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
    public function criar($data, Request $request)
    {
        
        // $data = $request->only([
        //     'matricula',
        //     'nome',
        //     'cpf',
        //     'rg',
        //     'nome_pai',
        //     'nome_mae',
        //     'telefone',
        //     'nacionalidade',
        //     'naturalidade',
        //     'titulo_eleitor',
        //     'reservista',
        //     'carteira_trabalho',
        //     'email',
            
        //     ]);

            $validator = Validator::make($data, [
                'matricula'=>'required|numeric',
               'nome'=> 'required',
               'cpf'=>'required|numeric',
                'rg'=>'required|numeric',
                'nome_pai'=>'required',
                'nome_mae'=>'required',
                'telefone'=>'required|numeric',
                 'nacionalidade'=>'required',
                'naturalidade'=>'required',
                 'titulo_eleitor'=>'required|numeric',
                'reservista'=>'required|numeric',
                 'carteira_trabalho'=>'required|numeric',
                 'rua' => 'required',
                'numero' => 'required',
                'bairro' => 'required',
                'complemento' => 'required',
                'cidade' => 'required',
                'estado' => 'required',
                'pais' => 'required',
                'cep' => 'required',
                 'email'=>'required',
                
                 ]);
                 if ($validator->fails()) {
                    throw new InvalidArgumentException($validator->errors());
                
                }


                $user = new User;
                $user->email = $request->email;
                $user->password = Hash::make('default'); //$request->CPF
                $user->assignRole($request->permissao);
                if($request->is_activated == "on" )
                {
                   $user->is_activated = 1;
                                    
                }else {
                    
                    $user->is_activated = 0;
                   
                 }
                $user->save();
        
        $pessoa = new Pessoa;
        $pessoa->nome = $request->nome;
        $pessoa->cpf = $request->cpf;
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
        $pessoa->save();

        $endereco = new Endereco;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->bairro = $request->bairro;
        $endereco->complemento = $request->complemento;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->pais = $request->pais;
        $endereco->cep = $request->cep;
        $endereco->save();

        $pessoa_endereco = new pessoas_endereco;
        $pessoa_endereco->pessoa_id = $pessoa->id;
        $pessoa_endereco->endereco_id = $endereco->id;
        $pessoa_endereco->save();


        $aluno = new Aluno;
        $aluno->pessoa_id = $pessoa->id;
        $aluno->matricula = $request->matricula;
        $aluno->curso_id = $request->nome_curso;

        $aluno->save();

        // $usuario = new User;
        // $usuario->email = $request->email;
        // $usuario->password = $request->password;
        // $usuario->is_activated = 1;
    }

    
    public function editar(array $data, int $id, Request $request)
    {
        // $data = $request->only([
        //     'matricula',
        //     'nome',
        //     'cpf',
        //     'rg',
        //     'nome_pai',
        //     'nome_mae',
        //     'telefone',
        //     'nacionalidade',
        //     'naturalidade',
        //     'titulo_eleitor',
        //     'reservista',
        //     'carteira_trabalho',
        //     'email',
          
        //     ]);

            $validator = Validator::make($data, [
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
                 'carteira_trabalho' => 'required',
                 'rua' => 'required',
                 'numero' => 'required',
                'bairro' => 'required',
                'complemento' => 'required',
                'cidade' => 'required',
                'estado' => 'required',
                'pais' => 'required',
                'cep' => 'required',
                 'email' => 'required|email',
                 
                 
                 ]);
                 if ($validator->fails()) {
                    throw new InvalidArgumentException($validator->errors());
                    
                }
                
                $aluno = Aluno::find($request->id);

                Aluno::Where('pessoa_id','=',$id)->update(['matricula'=>$request->matricula]);
                $pessoa = Pessoa::find($id);
                $pessoa->nome = $request->nome;
                $pessoa->cpf = $request->cpf;
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
               
                $pessoa->update();

                $pessoa_endereco =  pessoas_endereco::where('pessoa_id','=',$id)->get();
                $endereco = Endereco::find($pessoa_endereco[0]->endereco_id);
                $endereco->rua = $request->rua;
                $endereco->numero = $request->numero;
                $endereco->bairro = $request->bairro;
                $endereco->complemento = $request->complemento;
                $endereco->cidade = $request->cidade;
                $endereco->estado = $request->estado;
                $endereco->pais = $request->pais;
                $endereco->cep = $request->cep;
                $endereco->update();
               

                $user = User::find($pessoa->user_id);
                $user->email = $request->email;
                $user->password = Hash::make('default'); //$request->CPF
                $user->assignRole($request->permissao);
        if($request->is_activated == "on")
        {
           $user->is_activated = 1;
        }else{
            $user->is_activated = 0;
        }
        $user->save();
        $user->save();
      
    }



    public function excluir($id)
    {   
        if(null === $this->aluno->find($id)) {
            throw new \InvalidArgumentException("Não foi possível apagar este registro");

        }
        $this->aluno->find($id)->delete();

    }

}