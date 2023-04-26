<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoExamenExtranjeros extends Model
{
    use HasFactory;

    protected $table = 'codigo_examen_extranjeros';

    protected $fillable = [
        'examen_cod', 'examen_desc', 'examen_pais_cod', 'examen_aclaraciones', 'examen_nivel_ext'
    ];
}
