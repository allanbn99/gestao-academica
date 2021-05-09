<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Curso;
use App\Services\CursoService;
use Exception;

class CursoController extends Controller
{
    /**
     * @var CursoService $cursoService
     */
    private $cursoService;

    public function __construct(CursoService $cursoService)
    {
        $this->cursoService = $cursoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pesquisa = [
            'nome_curso' => $request->query('curso'),
            'semestres'  => $request->query('semestres'),
        ];

        $result = $this->cursoService->consultar($pesquisa);

        return view('secretaria.curso.index', [
            'cursos' => $result
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaria.curso.cadastrar');
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
            'nome_curso',
            'semestres',
        ]);

        try {
            $this->cursoService->criar($data);

        } catch (Exception $e) {
            throw ValidationException::withMessages(json_decode($e->getMessage(), true));

        }

        return redirect()->route('curso.index')->with('success', trans('validation.create-success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (null === Curso::find($id)) {
            abort(404);
        }

        return view('secretaria.curso.visualizar', [
            'curso' => Curso::find($id),
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
        if (null === Curso::find($id)) {
            abort(404);
        }

        return view('secretaria.curso.editar', [
            'curso' => Curso::find($id),
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
            'nome_curso',
            'semestres',
        ]);

        try {
            $this->cursoService->editar($data, $id);

        } catch (\Exception $e) {
            throw ValidationException::withMessages(json_decode($e->getMessage(), true));

        }

        return redirect()->route('curso.index')->with('success', trans('validation.update-success'));
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
            $this->cursoService->excluir($id);

        } catch (\Exception $e) {
            throw ValidationException::withMessages(['error' => [$e->getMessage()]]);

        }

        return redirect()->route('curso.index')->with('success', trans('validation.delete-success'));
    }
}
