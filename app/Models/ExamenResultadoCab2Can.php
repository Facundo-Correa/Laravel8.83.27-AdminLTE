<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenResultadoCab2Can extends Model
{
    use HasFactory;
    
    protected $table = 'examen_resultado_cab2_can';

    protected $fillable = [
        'examen_nro_control', 'can_numero', 'can_codigo', 'dcf_resultado_grado', 'dcf_resultado_calificacion',
        'cab2_guia_nombre', 'cab2_pri_1', 'cab2_pri_2', 'cab2_pri_3', 'cab2_pri_4', 'cab2_pri_5', 'cab2_seg_6',
        'cab2_seg_7', 'cab2_seg_8', 'cab2_resultado', 'cab2_calificacion', 'cab2_juez', 'cab2_figurante',
        'cab2_habilitado', 'cab2_revista', 'cab2_internet'
    ];
}
