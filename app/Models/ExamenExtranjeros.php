<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenExtranjeros extends Model
{
    use HasFactory;
    
    protected $table = 'examen_extranjeros';

    protected $fillable = [
        'examen_cod', 'can_letra', 'can_numero', 'examen_fecha', 'examen_resultado', 'examen_juez_nombre',
        'examen_pais_cod', 'examen_seleccion', 'examen_placa', 'examen_cab2osuperior', 'examen_cantidad_cria',
        'examen_grado', 'examen_calificacion', 'examen_sumula', 'examen_apto', 'examen_fecha_vto', 'examen_placacodo'
    ];
}
