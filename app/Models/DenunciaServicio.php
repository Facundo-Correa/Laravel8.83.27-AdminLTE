<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaServicio extends Model
{
    use HasFactory;

    protected $table = 'denuncia_servicio';

    protected $fillable = [
        'ds_nro_de_control', 'ds_nro_denu_ser', 'ds_fecha_tramite', 'ds_cliente_cod', 'ds_nro_form', 'ds_fecha_servicio',
        'ds_cliente_tipo_tratamiento', 'ds_nro_fact', 'ds_concepto_codigo_pla', 'ds_concepto_valor', 'ds_vf_fecha',
        'ds_vf_nro_fact', 'ds_tm', 'ds_tm_nro_fact', 'ds_tm_fecha_tramite', 'ds_can_codigo_letra_macho',
        'ds_can_codigo_numero_macho', 'ds_can_codigo_letra_hembra', 'ds_can_codigo_numero_hembra', 'ds_can_domicilio_hembra',
        'ds_can_telefono_hembra', 'ds_can_localidad_hembra', 'ds_criadero_cod', 'ds_criadero_cod', 'ds_observ_apto',
        'ds_observ_arrendamiento', 'ds_observ_firmas', 'ds_observ_registro_criadero', 'ds_observ_cosang',
        'ds_observ_edad', 'ds_baja_logica_cod', 'ds_baja_logica_observ', 'ds_condicional', 'datcodusuario',
        'ds_imprimi', 'ds_documento_pla', 'ds_cliente_agrup_cod', 'ds_cod_tramite', 'ds_grabe_talon', 
        'ds_revista', 'ds_internet', 'ds_peludo'
    ];

    public function criadero(){
        return $this->belongTo(Criaderos::class, 'ds_criadero_cod', 'id');
    }
}
