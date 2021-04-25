<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'pessoa_id',
        'pessoa_tipo_perfil_id',
        'pessoa_users_id',
        'curso_id',
        'curso_disciplina_id',
    ];
}
