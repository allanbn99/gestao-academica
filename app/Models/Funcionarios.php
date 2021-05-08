<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'pessoa_id',
        'cargo_id',
    ];
}
