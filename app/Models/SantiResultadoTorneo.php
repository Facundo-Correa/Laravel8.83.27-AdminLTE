<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiResultadoTorneo extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'id_can',
        'id_persona',
        'id_criadero',
        'id_tipo_torneo',
        'id_calendario',
        'id_categoria_torneo',
        'id_clasificacion_torneo',
        'puntaje',
        'puntaje_final',
        'puesto',
        'puesto_final',
        'agrupacion_puntaje'
    ];
}
