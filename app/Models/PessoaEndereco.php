<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaEndereco extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'pessoas_enderecos';

    protected $fillable = [
        'pessoa_id',
        'endereco_id'
    ];

    public function enderecoPessoa(){
        return $this->belongsTo(Endereco::class, 'pessoa_id', 'id');
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class, 'endereco_id', 'id');
    }
}
