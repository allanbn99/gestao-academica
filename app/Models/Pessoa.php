<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'nome_pai',
        'nome_mae',
        'telefone',
        'nacionalidade',
        'naturalidade',
        'titulo_eleitor',
        'reservista',
        'carteira_trabalho',
        'user_id',
        'tipo_perfil_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tipoPerfil() {
        return $this->belongsTo(TipoPerfil::class, 'tipo_perfil_id', 'id');
    }

    public function endereco(){
        return $this->hasOne(PessoaEndereco::class, 'pessoa_id', 'id');
    }

    public function funcionario(){
        return $this->hasOne(Funcionario::class);
    }
}
