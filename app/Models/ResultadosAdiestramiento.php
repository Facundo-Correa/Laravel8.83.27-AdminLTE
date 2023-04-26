<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadosAdiestramiento extends Model
{
    use HasFactory;
    
    protected $table = 'resultados_adiestramiento';

    protected $fillable = [
        'calendario_id', 'prueba_codigo', 'can_letra', 'can_numero', 'fecha_prueba', 'puesto',
        'calificacion_codigo', 'puntaje', 'guia', 'peludo', 'puntajea', 'puntajeb', 'puntajec'
    ];
}
