<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadosEstructura extends Model
{
    use HasFactory;

    protected $table = 'resultados_estructura';

    protected $fillable = [
        'calendario_id', 'can_letra', 'can_numero', 'fecha_prueba', 'puesto', 'sexo', 'categoria_codigo',
        'calificacion_codigo', 'guia', 'puntaje', 'agrupacion', 'agrupacion_puntaje', 'puesto_final',
        'categoria_final', 'puntaje_final', 'peludo'
    ];
}