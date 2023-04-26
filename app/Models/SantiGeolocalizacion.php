<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiGeolocalizacion extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $table = 'geolocalizacion';

    protected $fillable = [
        'id_padre',
        'nombre',
        'abreviatura',
        'codigo_lugar',
        'codigo_zona',
        'latitud',
        'longitud',
    ];
}
