<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiTorneo extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'nombre',
        'ingresa_tramite',
        'nacional',
        'interagrupacion',
        'regional',
        'interagrupacion_interior'
    ];
}
