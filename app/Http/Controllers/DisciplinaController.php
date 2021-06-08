<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Services\DisciplinaService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DisciplinaController extends Controller
{
    public function __construct(DisciplinaService $disciplinaService)
    {
        $this->disciplinaService = $disciplinaService;
    }

    public function index(Request $request)
    {
        $pesquisa = [
            'nome_disciplina' => $request->query('disciplina'),
            'carga_horaria'  => $request->query('carga_horaria'),
        ];

        $result = $this->disciplinaService->consultar($pesquisa);
        
        return view('secretaria.disciplina.index', [
            'disciplinas' => $result
        ]);
    }

    public function create()
    {
        return view('secretaria.disciplina.cadastrar');
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
            'nome_disciplina',
            'carga_horaria',
        ]);

        try {
            $this->disciplinaService->criar($data);

        } catch (Exception $e) {
            throw ValidationException::withMessages(json_decode($e->getMessage(), true));

        }

        return redirect()->route('disciplina.index')->with('success', trans('validation.create-success'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (null === Disciplina::find($id)) {
            abort(404);
        }

        return view('secretaria.disciplina.visualizar', [
            'disciplina' => Disciplina::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (null === Disciplina::find($id)) {
            abort(404);
        }

        return view('secretaria.disciplina.editar', [
            'disciplina' => Disciplina::find($id),
        ]);
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
        $data = $request->only([
            'nome_disciplina',
            'carga_horaria',
        ]);

        try {
            $this->disciplinaService->editar($data, $id);

        } catch (\Exception $e) {
            throw ValidationException::withMessages(json_decode($e->getMessage(), true));

        }

        return redirect()->route('disciplina.index')->with('success', trans('validation.update-success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ('delete-modal' === $id) {
            $id = (int)$request->delete_modal_id;
        }

        try {
            $this->disciplinaService->excluir($id);

        } catch (\Exception $e) {
            throw ValidationException::withMessages(['error' => [$e->getMessage()]]);

        }

        return redirect()->route('disciplina.index')->with('success', trans('validation.delete-success'));
    }
}
