<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoSeleccion extends Model
{
    use HasFactory;
    
    protected $table = 'resultado_seleccion';

    protected $fillable = [
        'resultado_seleccion_codigo', 'resultado_seleccion_descripcion', 
        'Resultado_seleccion_es_recahazada', 'resultado_seleccion_cantidad_servicios'
    ];
}
