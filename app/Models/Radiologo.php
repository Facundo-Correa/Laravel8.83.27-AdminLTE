<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radiologo extends Model
{
    use HasFactory;
    
    protected $table = 'radiologo';

    protected $fillable = [
        'radiologo_cod', 'radiologo_nombre', 'radiologo_apellido', 'radiologo_domicilio', 'radiologo_localidad',
        'radiologo_telefono', 'radiologo_inicio', 'radiologo_baja', 'radiologo_email', 'radiologo_zona',
        'radiologo_prov', 'radiologo_dni', 'radiologo_codigo_postal', 'radiologo_turno'
    ];
}
