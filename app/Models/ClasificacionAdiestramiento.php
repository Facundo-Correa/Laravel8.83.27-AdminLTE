<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasificacionAdiestramiento extends Model
{
    use HasFactory;

    protected $table = 'clasificacion_adiestramiento';

    protected $fillable = [
        'clasificacion_cod', 'clasificacion', 'aprobado'
    ];
}
