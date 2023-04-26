<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiCalendarioTorneo extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'id_torneo',
        'id_tipo_torneo',
        'id_categoria_torneo',
        'id_lugar',
        'id_delegacion',
        'id_agrupacion',
        'nombre',
        'fecha_desde',
        'fecha_hasta',
        'es_siegerchau',
        'ultima_fecha',
        'tomado',
        'publicado',
        'torneo_completo',
        'arancelado',
        'fecha_cierre',
        'cantidad_cuotas',
        'id_fecha'
    ];
}
