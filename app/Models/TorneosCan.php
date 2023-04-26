<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TorneosCan extends Model
{
    use HasFactory;
    
    protected $table = 'torneos_can';

    protected $fillable = [
        'can_letra', 'can_numero', 'torneo_codigo', 'calendario_codigo', 'torneo_tipo', 'prueba_adiestramiento',
        'categoria', 'agrupacion_que_compite', 'libre', 'cobrado', 'guia', 'delegacion', 'pais', 'it_pelolargo',
        'it_origenweb', 'librenosocio', 'librefueradezona'
    ];

    public function tTorneos()
    {
        return $this->belongsTo(Torneos::class, 'torneo_codigo', 'torneo_cod');
    }

    public function tCanNumero()
    {
        return $this->belongsTo(Canes::class, 'can_letra', 'can_codigo_numero');
    }

    public function tCanLetra()
    {
        return $this->belongsTo(Canes::class, 'can_letra', 'can_codigo_letra');
    }

    public function tcalendario()
    {
        return $this->belongsTo(Calendario::class, 'calendario_codigo', 'calendario_ide');
    }
}
