<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geolocalizacion extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'geolocalizacion';

    protected $fillable = [
        'parent_id',
        'nombre',
        'abreviatura',
        'codigo_lugar',
        'codigo_zona',
        'latitud',
        'longitud',
    ];
}
