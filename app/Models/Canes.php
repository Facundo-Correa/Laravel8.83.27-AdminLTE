<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canes extends Model
{
    use HasFactory;

    protected $table = 'canes';

    protected $fillable = [
        'can_codigo_letra', 'can_codigo_numero', 'can_codigo_extranjero', 'can_nro_extranjero', 'can_nombre', 'can_apellido',
        'can_madre_letra', 'can_madre_numero', 'can_madre_nombre', 'can_padre_letra', 'can_padre_numero',
        'can_padre_nombre', 'can_dn_nro_denu_ser', 'can_fecha_nacimiento', 'can_sexo', 'can_color', 'can_senias',
        'can_peludo', 'can_criadero_codigo', 'can_servicios_fertiles', 'can_servicios_informados',
        'can_cantidad_crias_permitidas', 'can_crias_registradas', 'can_emision_pedigree', 'can_agrupacion_compite',
        'can_nro_transferencia', 'can_dcf_grado', 'can_dcf_calificacion', 'can_dcfcodo_grado', 
        'can_dcfcodo_calificacion', 'can_seleccion_clase', 'can_seleccion_cantser', 'can_seleccion_fvto',
        'can_seleccion_validez', 'can_cab2', 'can_apto', 'can_examen_superior', 'can_cambio_residencia',
        'can_fecha_alta', 'can_fecha_defuncion', 'can_embargado', 'can_perdido', 'can_observaciones',
        'can_fecha_agrupacion_compite', 'can_padre_extranjero', 'can_pdi', 'can_PDIimp'
    ];
}
