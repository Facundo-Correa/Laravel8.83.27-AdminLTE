<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criaderos extends Model
{
    use HasFactory;

    protected $table = 'criaderos';

    protected $fillable = [
        'criadero_cod', 'criadero_cliente_cod', 'criadero_descripcion', 'criadero_domicilio', 'criadero_localidad',
        'criadero_telefono', 'criadero_codigoprov', 'criadero_zona', 'criadero_ultimaletra', 'criadero_tatu_rech_cod',
        'criadero_tatu_acep_cod', 'criadero_fechaalta', 'criadero_fechabaja', 'criadero_pais_cod', 'criadero_nombre_duenio',
        'criadero_observaciones'
    ];
}
