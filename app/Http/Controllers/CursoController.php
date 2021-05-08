<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\CursoService;

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

        $result = $this->cursoService->consultar(10, $pesquisa);

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
        //
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

        return redirect()->back()->with('success', trans('validation.delete-success'));
    }
}
