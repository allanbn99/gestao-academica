<?php

namespace App\Http\Controllers;

use App\Services\DisciplinaService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DisciplinaController extends Controller
{

    /*
    |---------------------------------------------------------------------------------------------
    |   Dependência
    |---------------------------------------------------------------------------------------------
    */
    private $disciplinaService;

    /*
    |---------------------------------------------------------------------------------------------
    |   Construtor faz a injeção da dependência.
    |---------------------------------------------------------------------------------------------
    */
    public function __construct(DisciplinaService $disciplinaService)
    {
        $this->disciplinaService = $disciplinaService;
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Retorna a página inicial.
    |---------------------------------------------------------------------------------------------
    */
    public function index()
    {
        return $this->disciplinaService->consultar();
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Retorna a página de cadastro.
    |---------------------------------------------------------------------------------------------
    */
    public function create()
    {
        return view('secretaria.disciplina.cadastrar');
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Insere um novo registro.
    |---------------------------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        return $this->disciplinaService->criar($request);
    }

    
    /*
    |---------------------------------------------------------------------------------------------
    |   Exibe todos os registros.
    |---------------------------------------------------------------------------------------------
    */
    public function show($id)
    {
        return $this->disciplinaService->visualizar($id, 'secretaria.disciplina.visualizar');
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Edita um registro.
    |---------------------------------------------------------------------------------------------
    */
    public function edit($id)
    {
        return $this->disciplinaService->visualizar($id, 'secretaria.disciplina.editar');
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Atualiza um registro.
    |---------------------------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        return $this->disciplinaService->editar($request, $id);
    }

    /*
    |---------------------------------------------------------------------------------------------
    |   Deleta um registro.
    |---------------------------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        return $this->disciplinaService->excluir($id);
    }
}
