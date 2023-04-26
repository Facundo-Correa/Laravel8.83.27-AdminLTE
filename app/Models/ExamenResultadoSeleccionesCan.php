<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenResultadoSeleccionesCan extends Model
{
    use HasFactory;
    
    protected $table = 'examen_resultado_selecciones_can';

    protected $fillable = [
        'examen_nro_control', 'can_numero', 'can_codigo', 'dcf_resultado_grado', 'DCF_Resultado_Calificacion',
        'cab2_resultado', 'cab2_clasificacion', 'seleccion_tiro', 'seleccion_ataque', 'Seleccion_fecha_vencimiento',
        'seleccion_nro_acta', 'seleccion_clase', 'Seleccion_Altur_de_Cruz', 'seleccion_prof_pecho', 'seleccion_circunf_pecho',
        'seleccion_peso', 'seleccion_color', 'seleccion_senias', 'Seleccion_Picmentacion', 'seleccion_pelaje',
        'seleccion_testiculo', 'seleccion_unias', 'seleccion_conformacion_cabeza', 'seleccion_ojo', 'seleccion_maxilar_sup',
        'seleccion_maxilar_inf', 'seleccion_stop', 'seleccion_oreja', 'seleccion_dentadura', 'seleccion_mordedura',
        'seleccion_fallas_dentarias', 'seleccion_observacion', 'Seleccion_Exp_Sexo', 'seleccion_constitucion',
        'seleccion_expresion', 'seleccion_conformacion', 'seleccion_musculatura', 'seleccion_fir_lig_ant',
        'seleccion_fir_lig_post', 'seleccion_dorso', 'seleccion_ang_ant', 'seleccion_ang_post', 'seleccion_fir_codos',
        'seleccion_fir_metacampos', 'seleccion_frente', 'seleccion_grupa', 'seleccion_cola', 'seleccion_fir_de_corvejones',
        'seleccion_caminado_de_frente', 'seleccion_caminado_por_detras', 'seleccion_corvejones', 'seleccion_pisada_enformade',
        'seleccion_trote', 'seleccion_pasadas_ant', 'seleccion_pasadas_post', 'seleccion_propulsion', 'seleccion_actitud',
        'seleccion_atencion', 'seleccion_nervios', 'seleccion_caracter', 'seleccion_reaccion_al_tiro', 'seleccion_firmeza_ataque',
        'seleccion_coraje', 'seleccion_espiritu_de_lucha', 'seleccion_apariencia_del_ejemplar', 'seleccion_examen_de_displasia',
        'seleccion_recomendacion_para_reproduccion', 'seleccion_razon_de_rechazo_temporario', 'seleccion_validez', 'seleccion_juez',
        'seleccion_revista', 'seleccion_internet', 'seleccion_grupaobservaciones', 'Seleccion_AplomosVistisdeFrente',
        'Seleccion_AplomosVistisdeAtras', 'seleccion_alcance', 'seleccion_firmezadorsal', 'seleccion_mordida',
        'seleccion_enrazonde', 'Seleccion_AspectoSanitarioyGral', 'seleccion_tipicidad', 'seleccion_cruz', 'seleccion_lineainferior',
        'seleccion_firmeza_de_codos', 'seleccion_formulario', 'dcfcodo_resultado_grado', 'dcfcodo_resultado_clasificacion'
    ];
}
