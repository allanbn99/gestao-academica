<?php

namespace App\Services;

use App\Models\Disciplina;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class DisciplinaService
{
    /**
     * @var Disciplina $disciplina
     */
    private $disciplina;

    public function __construct(Disciplina $disciplina)
    {
        $this->disciplina = $disciplina;
    }

    /**
     * Busca no banco registros de disciplinas
     */
    public function consultar(array $pesquisa = null, int $paginacao = 10): LengthAwarePaginator
    {
        if (null === $pesquisa) {
            return $this->disciplina->paginate($paginacao);
        }

        return $this->disciplina->where('nome_disciplina', 'LIKE', "%{$pesquisa['nome_disciplina']}%")
            ->where('carga_horaria', 'LIKE', "%{$pesquisa['carga_horaria']}%")
            ->paginate($paginacao);
    }

    /**
     * Criar nova Disciplina
     */
    public function criar(array $data)
    {
        $validator = Validator::make($data, [
            'nome_disciplina' => 'required',
            'carga_horaria'  => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors());
        }

        $this->disciplina->nome_disciplina = $data['nome_disciplina'];
        $this->disciplina->carga_horaria  = $data['carga_horaria'];

        $this->disciplina->save();
    }

    /**
     * Editar uma Disciplina
     */
    public function editar(array $data, int $id)
    {
        $validator = Validator::make($data, [
            'nome_disciplina' => 'required',
            'carga_horaria'  => 'required|numeric',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors());
        }

        $disciplinaEdit = $this->disciplina->find($id);

        $disciplinaEdit->nome_disciplina = $data['nome_disciplina'];
        $disciplinaEdit->carga_horaria  = $data['carga_horaria'];

        $disciplinaEdit->update();
    }

    /**
     * Exclui uma Disciplina
     */
    public function excluir($id)
    {
        if (null === $this->disciplina->find($id)) {
            throw new \InvalidArgumentException("Não foi possível apagar este registro");
        }

        $this->disciplina->find($id)->delete();
    }
}
