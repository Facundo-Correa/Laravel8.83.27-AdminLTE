<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenCategorias extends Model
{
    use HasFactory;
    
    protected $table = 'examen_categorias';

    protected $fillable = [
        'examen_categoria_cod', 'examen_categoria_desc', 'examen_categoria_tipo', 'examen_categoria_orden'
    ];
}
