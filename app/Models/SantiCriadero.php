<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiCriadero extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'nombre',
        'id_persona',
        'domicilio',
        'localidad',
        'telefono',
        'fecha_alta',
        'fecha_baja',
        'id_zona',
        'observaciones',
        'id_provincia',
        'id_pais'
    ];
}
