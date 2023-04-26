<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenResulDcf extends Model
{
    use HasFactory;
    
    protected $table = 'examen_resul_dcf';

    protected $fillable = [
        'examen_nro_control', 'can_letra', 'can_numero', 'dcf_grado', 'dcf_calificacion',
        'dcf_radiologo_cod', 'dcf_observaciones', 'dcf_revista', 'dcf_internet'
    ];
}
