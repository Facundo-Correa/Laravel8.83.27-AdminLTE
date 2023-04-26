<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionTorneos extends Model
{
    use HasFactory;
    
    protected $table = 'inscripcion_torneos';

    protected $fillable = [
        'it_nro_de_control', 'torneo_codigo', 'calendario_codigo', 'can_letra', 'can_numero', 'torneo_tipo',
        'categoria', 'prueba_adiestramiento', 'agrupacion_que_compite', 'libre', 'cobrado', 'it_fecha_tramite',
        'it_hora_tramite', 'it_datcodusuario', 'IT_nro_fact', 'it_concepto_codigo_pla', 'it_concepto_valor',
        'it_cliente_cod', 'it_cliente_tipo_tratamiento', 'it_documento_pla', 'it_cliente_agrup_cod', 'it_cod_tramite',
        'it_observ', 'it_imprimi', 'it_guia', 'it_delegacion', 'it_pais', 'it_pelolargo', 'it_origenweb', 'librenosocio',
        'librefueradezona'
    ];

    public function iTorneo()
    {
        return $this->belongsTo(Torneos::class, 'torneo_codigo', 'torneo_cod');
    }

    public function iCalendario(){
        return $this->belongsTo(Calendario::class, 'calendario_codigo', 'calendario_ide');
    }
}
