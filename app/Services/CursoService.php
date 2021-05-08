<?php

namespace App\Services;

use App\Models\Curso;
use Illuminate\Pagination\LengthAwarePaginator;

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
     *
     * @param int   $paginacao
     * @param array $pesquisa
     * @return      LengthAwarePaginator
     */
    public function consultar(int $paginacao = 10, array $pesquisa = null): LengthAwarePaginator
    {
        if (null === $pesquisa) {
            return $this->curso->paginate($paginacao);
        }

        return $this->curso->where('nome_curso', 'LIKE', "%{$pesquisa['nome_curso']}%")
            ->where('semestres', 'LIKE', "%{$pesquisa['semestres']}%")
            ->paginate($paginacao);
    }

    /**
     * Exclui um curso
     *
     * @param int $id
     */
    public function excluir($id)
    {
        if (null === $this->curso->find($id)) {
            throw new \InvalidArgumentException("Não foi possível apagar este registro");
        }

        $this->curso->find($id)->delete();
    }
}
