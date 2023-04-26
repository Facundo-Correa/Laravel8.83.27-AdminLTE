<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiAgrupacion extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'id_presidente',
        'id_delegado',
        'id_delegacion',
        'nombre',
        'descuento',
        'domicilio',
        'id_zona',
        'id_localidad',
        'id_provincia',
        'codigo_postal',
        'fecha_alta',
        'fecha_baja',
        'fecha_listado'
    ];
}
