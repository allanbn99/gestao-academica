<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Disciplina;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class DisciplinaService
{
    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   
    |------------------------------------------------------------------------------------------------------------------------
    */
    private $disciplina;

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   
    |------------------------------------------------------------------------------------------------------------------------
    */
    public function __construct(Disciplina $disciplina)
    {
        $this->disciplina = $disciplina;
    }

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Serviço para listar todas as disciplinas
    |------------------------------------------------------------------------------------------------------------------------
    */
    public function consultar()
    {
        return view('secretaria.disciplina.index', [
            'disciplinas' => $this->disciplina->paginate(10)
        ]);
    }

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Serviço para criar uma nova disciplina.
    |------------------------------------------------------------------------------------------------------------------------
    */
    public function criar(Request $request)
    {
        $request->validate([
            'nome_disciplina' => 'required',
            'carga_horaria'  => 'required',
        ]);
        DB::transaction(function () use($request) {
            Disciplina::create([
                'nome_disciplina' => $request->nome_disciplina,
                'carga_horaria' => $request->carga_horaria,
            ]);
        });
        return redirect()->route('disciplina.index')->with('success', trans('validation.create-success'));
    }

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Serviço para editar uma disciplina.
    |------------------------------------------------------------------------------------------------------------------------
    */
    public function editar(Request $request, int $id)
    {
        $request->validate([
            'nome_disciplina' => 'required',
            'carga_horaria'  => 'required|numeric',
        ]);
        DB::transaction(function () use($request, $id) {
            Disciplina::where('id', $id)->update([
                'nome_disciplina' => $request->nome_disciplina,
                'carga_horaria' => $request->carga_horaria
            ]);
        });
        return redirect()->route('disciplina.index')->with('success', trans('validation.update-success'));
    }

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Serviço para excluir uma disciplina.
    |------------------------------------------------------------------------------------------------------------------------
    */
    public function excluir($id)
    {
        if(empty(Disciplina::find($id))){
            return redirect()->route('disciplina.index')->withErrors(['error' => 'Disciplina não encontrada.']);
        }
        DB::transaction(function () use($id) {
            Disciplina::find($id)->delete();
        });
        return redirect()->route('disciplina.index')->with('success', trans('validation.delete-success'));
    }

    /*
    |------------------------------------------------------------------------------------------------------------------------
    |   Serviço para retornar dados de uma disciplina.
    |------------------------------------------------------------------------------------------------------------------------
    */
    public function visualizar($id, $view){
        $find = Disciplina::find($id);
        if($find == null){
            return redirect('secretaria/disciplina')->withErrors(['Disciplina não encontrada.']);
        }
        return view($view, [
            'disciplina' => $find
        ]);
    }
}
