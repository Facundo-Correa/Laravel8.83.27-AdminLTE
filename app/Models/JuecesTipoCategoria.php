<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuecesTipoCategoria extends Model
{
    use HasFactory;

    protected $table = 'jueces_tipo_categoria';

    protected $fillable = [
        'juez_cod',
        'tipo_cod',
        'categoria_cod',
        'juez_fecha_inicio',
        'juez_fecha_baja',
        'juez_nro_acta',
        'juez_zona',
        'juez_acta_baja'
    ];
}
