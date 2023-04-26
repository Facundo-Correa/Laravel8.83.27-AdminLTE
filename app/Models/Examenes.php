<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examenes extends Model
{
    use HasFactory;
    
    protected $table = 'examenes';

    protected $fillable = [
        'examen_nro_de_control', 'examen_cod', 'examen_categoria', 'examen_fecha', 'examen_lugar_cod',
        'examen_provincia', 'examen_tomado', 'examen_publicado_revista', 'examen_publicado_internet',
        'examen_nivel'
    ];
}
