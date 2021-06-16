<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;


class CursoService
{
    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   
    |-----------------------------------------------------------------------------------------------------------------------
    */
    private $curso;

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function __construct(Curso $curso)
    {
        $this->curso = $curso;
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Serviço que retorna a página inicial dos cursos.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function consultar()
    {
        return view('secretaria.curso.index', [
            'cursos' => $this->curso->paginate(10)
        ]);
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Serviço para cadastro um novo curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function criar(Request $request)
    {
        $request->validate([
            'nome_curso' => 'required',
            'semestres'  => 'required|numeric'
        ]);
        DB::transaction(function () use($request) {
            Curso::create([
                'nome_curso' => $request->nome_curso,
                'semestres' => $request->semestres
            ]);
        });
        return redirect()->route('curso.index')->with('success', trans('validation.create-success'));
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Serviço para editar um curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function editar(Request $request, int $id)
    {
        $request->validate([
            'nome_curso' => 'required',
            'semestres'  => 'required|numeric'
        ]);
        DB::transaction(function () use($request, $id){
            Curso::where('id', $id)->update([
                'nome_curso' => $request->nome_curso,
                'semestres' => $request->semestres
            ]);
        });
        return redirect()->route('curso.index')->with('success', trans('validation.update-success'));
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Serviço para excluir um curso.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function excluir($id)
    {
        if(empty(Curso::find($id))){
            return redirect()->route('curso.index')->withErrors(['error' => 'Curso não encontrado.']);
        }
        DB::transaction(function () use($id) {
            Curso::find($id)->delete();
        });
        return redirect()->route('curso.index')->with('success', trans('validation.delete-success'));
    }

    /*
    |-----------------------------------------------------------------------------------------------------------------------
    |   Serviço que retorna a view e os dados de um curso para edição ou visualização.
    |-----------------------------------------------------------------------------------------------------------------------
    */
    public function visualizar($id, $view){
        $find = Curso::find($id);
        if($find == null){
            return redirect()->route('curso.index')->withErrors(['Curso não encontrado.']);
        }
        return view($view, [
            'curso' => $find,
        ]);
    }
}
