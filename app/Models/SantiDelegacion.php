<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiDelegacion extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'nombre',
        'descuento',
        'domicilio',
        'id_localidad',
        'id_provincia',
        'codigo_postal',
        'id_zona',
        'id_presidente',
        'id_delegado',
        'fecha_alta',
        'fecha_baja',
    ];
}
