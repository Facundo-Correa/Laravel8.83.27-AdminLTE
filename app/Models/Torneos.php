<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneos extends Model
{
    use HasFactory;
    
    protected $table = 'torneos';

    protected $fillable = [
        'torneo_cod', 'torneo_desc', 'torneo_ingreso_por_tramites', 'torneos_es_interagrupacion',
        'torneos_es_nacional', 'torneos_es_regional', 'torneos_es_interagrup_interior',
    ];
}

// Torneos_can
// Inscripcion_Torneos
// Canes
// Torneos
// Parametros_nros_del_sistema


// Boton para importar tablas del sistema