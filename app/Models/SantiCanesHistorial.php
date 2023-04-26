<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiCanesHistorial extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'id_can',
        'id_persona',
        'id_padre',
        'id_madre',
        'id_criadero',
        'id_agrupacion',
        'es_extranjero',
        'id_extranjero',
        'id_dn_nro',
        'duenios_desde',
        'duenios_hasta',
        'duenios_autorizacion',
        'nro_transferencia',
        'marca_para_informes',
        'id_ex_duenio',
        'id_primer_duenio',
        'id_tipo_transferencia'
    ];
}
