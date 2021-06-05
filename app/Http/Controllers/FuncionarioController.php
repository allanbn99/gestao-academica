<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pessoa;
use App\Models\Endereco;
use App\Models\pessoas_endereco;
use App\Models\funcionarios;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\FuncionarioService;
use Illuminate\Validation\ValidationException;


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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        /*
        $tipo_perfils  = DB::table('tipo_perfils')->get();
        return view('secretaria.funcionario.Editar',['funcionario'=>$this->funcionarioService->visualizar($id)[0]
        ,'tipo_perfils'=>$tipo_perfils]);
        */

        $funcionario = funcionarios::find($id);
        $funcionario_pessoa = Pessoa::where('id', '=', $funcionario->pessoa_id)->get();
        $funcionario_enderecos_id = DB::table('pessoas_enderecos')->where('pessoa_id', '=', $funcionario->pessoa_id)->get()[0];
        $funcionario_enderecos = Endereco::where('id', '=', $funcionario_enderecos_id->endereco_id)->get();

        $funcionario_usuarios = User::find($funcionario_pessoa[0]->user_id);

              return view('secretaria.funcionario.Editar',
              ['pessoas_enderecos'=>$funcionario_enderecos,
                'funcionario_pessoa'=>$funcionario_pessoa,
                'funcionario'=>$funcionario,
                'funcionario_enderecos'=>$funcionario_enderecos,
                'funcionario_usuarios'=>$funcionario_usuarios,

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



         $funcionario = funcionarios::find($request->id);

         $pessoa = Pessoa::find($id);
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
        //  $pessoa->tipo_perfil_id = $request->tipo_perfil_id;

        // // $pessoa->celu = $request->telefone;
         $pessoa->save();

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
        // // $user->save();

       $user->save();
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
