<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pessoas_endereco extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'pessoa_id',
        'endereco_id'
    ];

    public function endereco(){
        return $this->belongsTo(Endereco::class, 'pessoa_id', 'id');
    }
}
