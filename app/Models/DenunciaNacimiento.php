<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaNacimiento extends Model
{
    use HasFactory;

    protected $table = 'denuncia_nacimiento';

    protected $fillable = [
        'dn_nro_de_control', 'dn_nro_dnu_ser', 'dn_fecha_tramite', 'dn_fecha_nacimiento', 'dn_cliente_cod',
        'dn_cliente_tipo_tratamiento', 'dn_nro_fact', 'dn_concepto_codigo_pla', 'dn_concepto_valor', 
        'dn_ndebito_valor', 'dn_credito_valor', 'dn_can_codigo_letra_macho', 'dn_can_codigo_numero_macho',
        'dn_can_codigo_letra_hembra', 'dn_can_codigo_numero_hembra', 'dn_can_domicilio_hembra',
        'dn_can_telefono_hembra', 'dn_can_localidad_hembra', 'dn_zona_hembra', 'dn_criadero_cod',
        'dn_tatuador_cod', 'dn_cant_crias_nacidas_macho', 'dn_cant_crias_nacidas_hembra', 'dn_cant_crias_nacidas_muertas_macho',
        'dn_cant_crias_nacidas_muertas_hembras', 'dn_cantidad_crias_sacrificadas_macho', 'dn_cantidad_crias_sacrificadas_hembra',
        'dn_observ', 'dn_observ_del_parto', 'dn_inspeccion_solicitante', 'dn_inspeccion_ejecutante', 'dn_inspeccion_fecha',
        'dn_condicional', 'dn_datcodusuario', 'dn_documento_pla', 'dn_cliente_agrup_cod', 'dn_cod_tramite',
        'dn_ic_fecha_tramite', 'dn_ic_fecha_inscripcion', 'dn_ic_cant_crias_sobrevivientes_macho', 'dn_ic_cant_crias_sobrevivientes_hembra',
        'dn_ic_pendiente_alta_cria', 'dn_ic_datcodusuario', 'dn_ic_condicional', 'dn_ic_nro_fact', 'dn_ic_concepto_codigo_pla',
        'dn_ic_concepto_valor', 'dn_ic_ndebito_valor', 'dn_ic_ncredito_valor', 'dn_ic_documento_pla', 'dn_ic_cliente_agrup_cod',
        'dn_ic_imprimi', 'dn_imprimi', 'dn_ic_cod_tramite', 'dn_revista', 'dn_revista'
    ];
}