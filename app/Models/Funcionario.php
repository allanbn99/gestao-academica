<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'funcionarios';

    protected $fillable = [
        'matricula',
        'pessoa_id',
        'cargo_id',
        'is_status'
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }

}
