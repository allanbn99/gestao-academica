<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'matricula',
        'pessoa_id',
        'curso_id',
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
}
