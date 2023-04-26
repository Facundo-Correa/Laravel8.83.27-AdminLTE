<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteTramites extends Model
{
    use HasFactory;
    
    protected $table = 'reporte_tramites';

    protected $fillable = [
        'tr_usuario', 'tr_cliente_agrup_cod', 'tr_cliente_venta', 'tr_concepto_codigo_pla',
        'tr_concepto_valor', 'tr_nro_fact', 'tr_ndebito_valor', 'tr_ncredito_valor', 'tr_documento_pla',
        'tr_fecha_tramite', 'tr_condicional', 'tr_tramite', 'tr_fecha', 'tr_hora', 'tr_transaccion',
        'tr_tipo_tratamiento', 'tr_publi_internet', 'tr_puibli_internet_fecha', 'tr_publi_revista',
        'tr_publi_revista_fecha', 'tr_baja_logico', 'tr_leyenda', 'tr_id'
    ];
}
