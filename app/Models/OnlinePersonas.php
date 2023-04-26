<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePersonas extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'nombre',
        'nombre_legal',
        'es_glob',
        'domicilio',
        'localidad',
        'cod_postal',
        'provincia',
        'pais',
        'telefono',
        'fax',
        'email',
        'observacion',
        'id_proveedor',
        'referencia',
        'hora_atencion',
        'hora_entrega',
        'condicion_iva',
        'cuit',
        'ing_brutos',
        'contacto_venta',
        'contacto_cobro',
        'cond_pago',
        'moneda_cte',
        'id_tipo',
        'id_actividad',
        'id_delegacion',
        'id_agrupacion',
        'id_distrito',
        'estado_socio',
        'id_vendedor',
        'id_zona_venta',
        'id_cobrador',
        'id_flete',
        'bloqueado_ped',
        'bloqueado_fac',
        'fecha_alta',
        'fecha_baja',
        'habil_web',
        'password_web',
        'formato_fimc',
        'habil_fabn',
        'id_vendedor_2',
        'string_1',
        'string_2',
        'string_3',
        'string_4',
        'fecha_1',
        'fecha_2',
        'fecha_3',
        'fecha_4',
        'clasif_npcv_1',
        'clasif_npcv_2',
        'clasif_npcv_3',
        'clasif_npcv_4',
        'clasif_npcv_5',
        'clasif_npcv_6',
        'habil_cc',
        'persona_ext',
        'fecha_prox_gc',
        'prox_ges_cobr',
        'acct_gencbpte',
        'nodo_origen',
        'municipio',
        'inf_tabasto',
        'cobro_correl',
        'vehiculo',
        'distribuidor',
        'zona_distrib'
    ];
}
