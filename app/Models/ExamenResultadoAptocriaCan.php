<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenResultadoAptocriaCan extends Model
{
    use HasFactory;
    
    protected $table = 'examen_resultado_aptocria_can';

    protected $fillable = [
        'examen_nro_control', 'can_codigo', 'can_numero', 'dcf_resultado_grado', 'dc_resultado_calificacion', 'apto_alzada',
        'apto_cierre', 'apto_dentadura', 'apto_informe', 'apto_tiro', 'apto_ataque', 'apto_vara', 'apto_apto', 'apto_cantidad_servicios',
        'apto_calificacion', 'apto_observaciones', 'apto_codjuez_veedor', 'apto_codhabilitado_veedor', 'apto_revista', 'apto_internet',
    ];
}
