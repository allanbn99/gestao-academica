<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    // public function __construct(CursoService $cursoService)
    // {
    //     $this->cursoService = $cursoService;
    // }

    public function index(Request $request)
    {
        // $pesquisa = [
        //     'nome_curso' => $request->query('curso'),
        //     'semestres'  => $request->query('semestres'),
        // ];

        // $result = $this->cursoService->consultar($pesquisa);

        return view('secretaria.disciplina.index', [
            // 'cursos' => $result
        ]);
    }
}
