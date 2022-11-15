<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'desp_descricao',
        'desp_data',
        'desp_usuario',
        'desp_valor'
    ];

}
