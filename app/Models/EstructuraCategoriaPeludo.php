<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstructuraCategoriaPeludo extends Model
{
    use HasFactory;
    
    protected $table = 'estructura_categoria_peludo';

    protected $fillable = [
        'codigo_categoria', 'denominacion', 'meses_desde', 'meses_hasta', 'pedigree_obligatorio', 'sexo', 'Seleccionados'
    ];
}
