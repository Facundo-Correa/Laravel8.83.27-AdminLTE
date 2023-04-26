<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;

    protected $table = 'calendario';

    protected $fillable = [
        'torneo_cod', 'anio', 'nro_de_fecha', 'fecha_desde', 'fecha_hasta', 'lugar_codigo', 'provincia_cod',
        'pais_codigo', 'calendario_id', 'categoria_codigo', 'agrupacion_codigo', 'delegacion_codigo',
        'torneo_que_suma', 'es_ultima_fecha', 'tomado', 'publicado', 'fecha_nombre', 'torneo_es_siegerchau',
        'torneo_completo', 'arancelado', 'fcierre', 'cantcuotas'
    ];

    public function calendarioTorneo()
    {
        return $this->belongsTo(Torneos::class, 'torneo_cod', 'torneo_cod');
    }
}
