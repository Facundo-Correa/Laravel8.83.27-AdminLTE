<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tatuador extends Model
{
    use HasFactory;

    protected $table = 'tatuador';

    protected $fillable = [
        'tatuador_cod',
        'tatuador_cliente_cod',
        'tatuador_clave',
        'tatuador_nro',
        'tatuador_fechainicio',
        'tatuador_fechabaja',
        'tatuador_nro_acta',
        'tatuador_ult_num',
        'tatuador_acta_baja',
        'tatuador_zona'
    ];
}
