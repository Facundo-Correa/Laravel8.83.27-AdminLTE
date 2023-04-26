<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanesSanti extends Model
{
    use HasFactory;

    protected $table = 'canes';

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'madre_nombre',
        'padre_nombre',
        // 'dn_nro',
        'nacimiento',
        'sexo',
        'id_color',
        'id_senias',
        'peludo',
        'servicios_fertiles',
        'servicios_informados',
        'crias_permitidas',
        'crias_registradas',
        'emision_pedigree',
        // 'nro_transferencia',
        'dcf_grado',
        'dcf_calificacion',
        'dcfcodo_grado',
        'dcfcodo_calificacion',
        'seleccion_clase',
        'seleccion_cantser',
        'seleccion_fvto',
        'seleccion_validez',
        'cab2',
        'apto',
        'examen_superior',
        'cambio_residencia',
        'fecha_alta',
        'fecha_defuncion',
        'embargado',
        'perdido',
        'observaciones',
        'fecha_agrupacion_compite',
    ];
}
