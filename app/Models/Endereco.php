<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'enderecos';

    protected $fillable = [
        'rua',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'estado',
        'pais',
        'cep'
    ];

    public function pessoaEndereco(){
        return $this->hasOne(PessoaEndereco::class, 'endereco_id', 'id');
    }
}
