<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenResultadoSuperiorCan extends Model
{
    use HasFactory;

    protected $table = 'examen_resultado_superior_can';

    protected $fillable = [
        'id',
        'can_codigo',
        'can_numero',
        'examen_nro_control',
        'aprobado_seccion_a',
        'aprobado_seccion_b',
        'aprobado_seccion_c',
        'aprobado_seccion_d',
        'calificacion_seccion_a',
        'calificacion_seccion_b',
        'calificacion_seccion_c',
        'puntos_seccion_a',
        'puntos_seccion_b',
        'puntos_seccion_c',
        'total_puntos',
        'guia_nombre',
        'total',
        'figurante',
        'marcador',
        'juez',
        'sup_revista',
        'sup_internet'
    ];
}
