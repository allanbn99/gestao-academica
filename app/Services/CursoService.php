<?php

namespace App\Services;

use App\Models\Curso;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;


class CursoService
{
    /**
     * @var Curso $curso
     */
    private $curso;

    public function __construct(Curso $curso)
    {
        $this->curso = $curso;
    }

    /**
     * Busca no banco registros de curso
     */
    public function consultar(array $pesquisa = null, int $paginacao = 10): LengthAwarePaginator
    {
        if (null === $pesquisa) {
            return $this->curso->paginate($paginacao);
        }

        return $this->curso->where('nome_curso', 'LIKE', "%{$pesquisa['nome_curso']}%")
            ->where('semestres', 'LIKE', "%{$pesquisa['semestres']}%")
            ->paginate($paginacao);
    }

    /**
     * Criar novo curso
     */
    public function criar(array $data)
    {
        $validator = Validator::make($data, [
            'nome_curso' => 'required',
            'semestres'  => 'required|numeric',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors());
        }

        $this->curso->nome_curso = $data['nome_curso'];
        $this->curso->semestres  = $data['semestres'];

        $this->curso->save();
    }

    /**
     * Editar um curso
     */
    public function editar(array $data, int $id)
    {
        $validator = Validator::make($data, [
            'nome_curso' => 'required',
            'semestres'  => 'required|numeric',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors());
        }

        $cursoEdit = $this->curso->find($id);

        $cursoEdit->nome_curso = $data['nome_curso'];
        $cursoEdit->semestres  = $data['semestres'];

        $cursoEdit->update();
    }

    /**
     * Exclui um curso
     */
    public function excluir($id)
    {
        if (null === $this->curso->find($id)) {
            throw new \InvalidArgumentException("Não foi possível apagar este registro");
        }

        $this->curso->find($id)->delete();
    }
}
