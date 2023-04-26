<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TorneosPrueba extends Model
{
    use HasFactory;
    protected $table = 'torneos_prueba';

    protected $fillable = [
        'torneo_id', 'prueba_codigo'
    ];
    //tabla diferente que no tiene nada que ver con la tabla Torneos
}
