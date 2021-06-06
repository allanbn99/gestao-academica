<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPerfil extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nome_perfil',
        'is_vinculo'
    ];
}
